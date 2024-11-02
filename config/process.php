<?php 
    session_start();

    include_once("connection.php");
    include_once("url.php");

    $data = $_POST;

    if(!empty($data)){
        
       
        if($data['type'] === "create"){
            $name = $data['name'];
            $telefone = $data['phone'];
            $observacoes = $data['observations'];
            
            $query = "INSERT INTO contatos (name,telefone,observacoes) VALUES (:name, :telefone, :observacoes)";

            $stmt = $oCon->prepare($query);
            $stmt->bindParam(":name",$name);
            $stmt->bindParam(":telefone",$telefone);
            $stmt->bindParam(":observacoes",$observacoes);

            try{
                $stmt->execute();
                $_SESSION['msg'] = "Contato criado com sucesso";
            }catch(PDOException $e){
                $error = $e->getMessage();
                echo "Erro: $error" ;
            }
        } else if($data["type"] === 'edit'){
            print_r($data);
            $name = $data["name"];
            $telefone = $data["phone"];
            
            $observacoes = $data["observation"];
           
            
            $id = $data["id"];

            $query = "UPDATE contatos SET name = :name, telefone = :telefone, observacoes = :observacoes WHERE id = :id";
            $stmt = $oCon->prepare($query);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":observacoes", $observacoes);
            $stmt->bindParam(":id", $id);

            try{
                $stmt->execute();
                $_SESSION['msg'] = "contato alterado com sucesso";
            }catch(PDOException $e){
                $error = $e->getMessage();
                echo "Erro: $error";
            }
        }else if($data['type'] === 'delete'){
            $id = $data['id'];

            $query = "DELETE FROM contatos WHERE id = :id";

            $stmt = $oCon->prepare($query);

            $stmt->bindParam(":id", $id);

            try{
                $stmt->execute();
                $_SESSION['msg'] = "Contato deletado com sucesso";
            }catch(PDOException $e){
                $error = $e->getMessage();
                echo "Erro: $error";
            }
        }
        header("Location:" . $BASE_URL . "../index.php");
    }else{
        $id;
        if(!empty($_GET)){
            $id = $_GET['id'];
            
        }
        if(!empty($id)){
            $query = "SELECT * FROM contatos WHERE id = :id";
            $stmt = $oCon->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $contato = $stmt->fetch();
        }else{
        $query = "SELECT * FROM contatos";
        $stmt = $oCon->prepare($query);
        $stmt->execute();
        $contatos = $stmt->fetchAll();
        }
    }

   $oCon = null; // fecha conexão no PDO
    
    
    
    
?>