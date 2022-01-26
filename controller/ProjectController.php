<?php
    namespace Controller;  
    use App\Session;
    use App\Router;
    use App\AbstractManager;
    use Model\Manager\ProjectManager;
    use Model\Manager\HasAccessManager;
    use Model\Manager\ListProjectManager;
    use Model\Manager\CardManager;

    class ProjectController extends Router {


        /**
         * Afficher toutes les notes d'une personne (via une valeur get dans l'url)
         */
        public function seeProjectsFromUser(){

            if (!Session::hasUser()){ // if not connected, can't go here
                header("Location: ./index.php");
            }

            $project = new HasAccessManager();
            $currentUserId = Session::getUser()->getId();
            $projects = $project->findProjectUserAccess($currentUserId);
            $this->view('project/seeProjects.php', [
                'projects' => $projects,
                "pageTitle" => "MyBeard - Tous mes projets",
              ]);
        }     

        public function createProject(){
            if (!Session::hasUser()){ // if not connected, can't go here
                header("Location: ./index.php");
            }
            $this->view('notes/newProject.php', [
                "pageTitle" => "MyBeard - Créer un projet",
              ]);
        }  

        public function createProjectOK(){
            if (!Session::hasUser()){ // if not connected, can't go here
                header("Location: ./index.php");
            }
            $formData = filter_var_array($_POST, FILTER_SANITIZE_STRING);


            if (!isset($formData["name"]) || !isset($formData["description"])){ // if not deleted{
                header("Location: ./newProject.php");
            }else{
                if((strlen($formData["name"]) < 3) || (strlen($formData["description"]) < 1)){ // long enough
                    header("Location: ./newProject.php");
                }else{
                    $projectManager = new ProjectManager();
                    $newProject = $projectManager->createProject($formData["name"], $formData["description"], Session::getUser()->getId());
                    header("Location: ./seeProjects.php");
                }
            }
        }

        public function projectOverview(){
            if (!Session::hasUser()){ // if not connected, can't go here
                header("Location: ./index.php");
            }
            if (!$_GET["idProject"]){ // parameter isn't here
                header("Location: ./seeProjects.php");
            }

            $idProject = filter_var($_GET["idProject"], FILTER_SANITIZE_NUMBER_INT);

            $projectAccess = new HasAccessManager();
            $currentUserId = Session::getUser()->getId();
            $projectIsAccessible = $projectAccess->hasAccessToProject($currentUserId, $idProject);

            if (!$projectIsAccessible){ // is not allowed in this project
                header("Location: ./index.php");
            }

            $projectGetInfo = new ProjectManager();
            $projectInfos = $projectGetInfo->findOneById($idProject);

            $projectList = new ListProjectManager();
            $projectLists = $projectList->getAllListFromProject($idProject);

            $projectCard = new CardManager();

            $tableListAndCard = [];
            $i = 0;
            $tableEverything = [];

            foreach ($projectLists as $list) {

                $projectCards = $projectCard->getAllCardFromList($list->getId());

                $tableListAndCard[$list->getName().$i] = $projectCards;

                $tableEverything += [
                    "list".$i => [
                        "listProject".$i => $list,
                        "cards" => $projectCards,
                    ]
                ];
                $i++;
            }

            $project = new HasAccessManager();
            $currentUserId = Session::getUser()->getId();
            $projects = $project->findProjectUserAccess($currentUserId);

            $usersProject = $project->findUsersInProject($idProject);


            

            $this->view('notes/userPage.php', [
                "projectLists" => $projectLists,
                "idProject" => $idProject,
                "projectLists2" => $tableListAndCard,
                "tableEverything" => $tableEverything,
                "projectsAcces" => $projects,
                "usersProject" => $usersProject,
                "projectInfos" => $projectInfos,
                "pageTitle" => "MyBeard - Projet ".$projectInfos->getName(),
            ]);
        }

        public function projectCreateList(){
            if (!Session::hasUser()){ // if not connected, can't go here
                header("Location: ./index.php");
            }
            if (!$_GET["idProject"]){ // parameter isn't here
                header("Location: ./seeProjects.php");
            }
            $idProject = filter_var($_GET["idProject"], FILTER_SANITIZE_NUMBER_INT);

            $projectAccess = new HasAccessManager();
            $currentUserId = Session::getUser()->getId();
            $projectIsAccessible = $projectAccess->hasAccessToProject($currentUserId, $idProject);

            if (!$projectIsAccessible){ // is not allowed in this project
                header("Location: ./index.php");
            }

            $currentProject = new ProjectManager();
            $currentProject = $currentProject->findOneById($idProject);



            $this->view('notes/list.php', [
                "currentProject" => $currentProject,
                "pageTitle" => "MyBeard - Créer une nouvelle liste",
            ]);
        }

        public function projectCreateListOk(){
            if (!Session::hasUser()){ // if not connected, can't go here
                header("Location: ./index.php");
            }
            if (!$_GET["idProject"]){ // parameter isn't here
                header("Location: ./index.php");
            }

            $idProject = filter_var($_GET["idProject"], FILTER_SANITIZE_NUMBER_INT);
            $formData = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            $projectAccess = new HasAccessManager();
            $currentUserId = Session::getUser()->getId();
            $projectIsAccessible = $projectAccess->hasAccessToProject($currentUserId, $idProject);

            if (!$projectIsAccessible){ // is not allowed in this project
                header("Location: ./index.php");
            }else if (!isset($formData["name"])){ // deleted
                header("Location: ./list.php?idProject=".$idProject);
            }else if((strlen($formData["name"]) < 3)){ // long enough
                header("Location: ./list.php?idProject=".$idProject);
            }else{
                $listProjectManager = new ListProjectManager();
                $newListt = $listProjectManager->createList($formData["name"], $idProject);
                header("Location: ./userPage.php?idProject=".$idProject);
            }            
        }

        public function projectCreateCard(){
            if (!Session::hasUser()){ // if not connected, can't go here
                header("Location: ./index.php");
            }
            if (!$_GET["idList"]){ // parameter isn't here
                header("Location: ./index.php");
            }
            $idList = filter_var($_GET["idList"], FILTER_SANITIZE_NUMBER_INT);


            $currentList = new ListProjectManager();
            $currentList = $currentList->findOneById($idList);

            $projectAccess = new HasAccessManager();
            $currentUserId = Session::getUser()->getId();
            $projectIsAccessible = $projectAccess->hasAccessToProject($currentUserId, $currentList->getProject()->getId());

            if (!$projectIsAccessible){ // is not allowed in this project
                header("Location: ./index.php");
            }
            

            $this->view('notes/card.php', [
                "currentList" => $currentList,
                "pageTitle" => "MyBeard - Créer une nouvelle carte",
            ]);
        }
        
        public function projectCreateCardOk(){
            if (!Session::hasUser()){ // if not connected, can't go here
                header("Location: ./index.php");
            }
            if (!$_GET["idList"]){ // parameter isn't here
                header("Location: ./index.php");
            }
            $idList = filter_var($_GET["idList"], FILTER_SANITIZE_NUMBER_INT);
            $formData = filter_var_array($_POST, FILTER_SANITIZE_STRING);

            $currentList = new ListProjectManager();
            $currentList = $currentList->findOneById($idList);

            $projectAccess = new HasAccessManager();
            $currentUserId = Session::getUser()->getId();
            $projectIsAccessible = $projectAccess->hasAccessToProject($currentUserId, $currentList->getProject()->getId());

            $colorList = ["Bleu", "Orange", "Cyan", "Jaune", "Violet"];

            if (!$projectIsAccessible){ // is not allowed in this project
                header("Location: ./index.php");
            }else if(!isset($formData["name"]) || !isset($formData["description"]) || !isset($formData["color"])){
                header("Location: ./card.php?idList=".$idList);
            }else if((strlen($formData['name']) < 3) || (strlen($formData['description']) < 1) || (!in_array($formData['color'], $colorList))){
                header("Location: ./card.php?idList=".$idList);
            }else{
               $dateToday = date("Y-m-d");

                $idProject = $currentList->getProject()->getId();

                $listCardManager = new CardManager();

                $listCardManager->createCard($formData['name'], $formData['description'], $dateToday, $formData['color'], $idList);

                header("Location: ./userPage.php?idProject=".$idProject); 
            }

            
        }

        public function editCard(){
            if (!Session::hasUser()){ // if not connected, can't go here
                header("Location: ./index.php");
            }
            if (!$_GET["idCard"]){ // parameter isn't here
                header("Location: ./index.php");
            }
            $idCard = filter_var($_GET["idCard"], FILTER_SANITIZE_NUMBER_INT);


            $currentCard = new CardManager();
            $currentCard = $currentCard->findOneById($idCard);

            if ($currentCard){ //exist
                $projectAccess = new HasAccessManager();
                $currentUserId = Session::getUser()->getId();
                $projectIsAccessible = $projectAccess->hasAccessToProject($currentUserId, $currentCard->getListProject()->getProject()->getId());

                if (!$projectIsAccessible){ // is not allowed in this project
                    header("Location: ./index.php");
                }
            }

            $allListFromProject = new ListProjectManager();
            $allListFromProject = $allListFromProject->getAllListFromProject($currentCard->getListProject()->getProject()->getId());

            $this->view('notes/cardModif.php', [
                "currentCard" => $currentCard,
                "allListFromProject" => $allListFromProject,
                "pageTitle" => "MyBeard - Editer une carte",
            ]);
        }

        public function editCardOk(){
            if (!Session::hasUser()){ // if not connected, can't go here
                header("Location: ./index.php");
            }
            if (!$_GET["idCard"]){ // parameter isn't here
                header("Location: ./index.php");
            }
            $idCard = filter_var($_GET["idCard"], FILTER_SANITIZE_NUMBER_INT);
            $formData = filter_var_array($_POST, FILTER_SANITIZE_STRING);

            $currentCard = new CardManager();
            $currentCard = $currentCard->findOneById($idCard);

            if ($currentCard){ //exist
                $projectAccess = new HasAccessManager();
                $currentUserId = Session::getUser()->getId();
                $projectIsAccessible = $projectAccess->hasAccessToProject($currentUserId, $currentCard->getListProject()->getProject()->getId());
                

                $colorList = ["Bleu", "Orange", "Cyan", "Jaune", "Violet"];

                if (!$projectIsAccessible){ // is not allowed in this project
                    header("Location: ./index.php");
                }else if(!isset($formData["name"]) || !isset($formData["description"]) || !isset($formData["color"]) || !isset($formData["newList"])){
                    header("Location: ./cardModif.php?idCard=".$idCard);
                }else if((strlen($formData['name']) < 3) || (strlen($formData['description']) < 1) || (!in_array($formData['color'], $colorList))){
                    header("Location: ./cardModif.php?idCard=".$idCard);
                }else{
                    $idProject = $currentCard->getListProject()->getProject()->getId();
                    $listFromProject = new ListProjectManager();
                    $listFromProject = $listFromProject->isListInProject($formData["newList"], $idProject);
                    if (!empty($listFromProject)){
                        $listCardManager = new CardManager();
                        $listCardManager->editCard($idCard, $formData["name"], $formData["description"], $formData["color"], $formData["newList"]);
                        header("Location: ./userPage.php?idProject=".$idProject); 
                    }else{
                        header("Location: ./cardModif.php?idCard=".$idCard);
                    }   
                }
            }
        }

        public function cardDelete(){
            if (!Session::hasUser()){ // if not connected, can't go here
                header("Location: ./index.php");
            }
            if (!$_GET["idCard"]){ // parameter isn't here
                header("Location: ./index.php");
            }
            $idCard = filter_var($_GET["idCard"], FILTER_SANITIZE_NUMBER_INT);


            $currentCard = new CardManager();
            $currentCard = $currentCard->findOneById($idCard);

            if ($currentCard){ //exist
                $projectAccess = new HasAccessManager();
                $currentUserId = Session::getUser()->getId();
                $currentProjectId = $currentCard->getListProject()->getProject()->getId();
                $projectIsAccessible = $projectAccess->hasAccessToProject($currentUserId, $currentCard->getListProject()->getProject()->getId());

                if (!$projectIsAccessible){ // is not allowed in this project
                    header("Location: ./index.php");
                }else{
                    $currentCard = new CardManager();
                    $currentCard->cardDelete($idCard);
                    header("Location: ./userPage.php?idProject=".$currentProjectId); 
                }
            }else{
                header("Location: ./index.php");
            }
        }
    }