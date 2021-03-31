<?php 
class Categories extends Database{
    public function addCategory($name){
        $query = "INSERT INTO `categories` (`id`, `nom`) VALUES (NULL, :name)";
        $insert = $this->dataBase->prepare($query);
        $insert->bindParam(':name', $name);
        $insert->execute();
        header('Location:addcategorie.php?err=success');
    }
    public function modifyCategory($name, $id){
        $query = "UPDATE categories SET nom = :name WHERE id = :id";
        $prepare = $this->dataBase->prepare($query);
        $prepare->bindParam(':name', $name);
        $prepare->bindParam(':id', $id);
        $prepare->execute();
        header('Location:addcategorie.php?modif=true&err=changed');
    }
    public function deleteCategory($id){
        $query = "DELETE FROM categories WHERE id = $id";
        $this->dataBase->query($query);
    }
    public function getAllCategory(){
        $query = "SELECT * FROM categories";
        $queryObj = $this->dataBase->query($query);
        $result = $queryObj->fetchAll();
        return $result;
    }
    public function getCategory($id){
        $query = "SELECT * FROM categories WHERE id=$id";
        $queryObj = $this->dataBase->query($query);
        $result = $queryObj->fetch();
        return $result;
    }
}