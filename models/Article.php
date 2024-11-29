<?php

namespace Models;

class Article{

  // Les mots clés d'accès sont : public, protected et private.
  public static int $id;
  public static string $title;
  public static string $content;
  public static string $author;
  public static string $created_date;
  public static string $modification_date;

  private static $bdd;

  public function __construct($bdd = null){
    if(!is_null($bdd)){
      self::setBdd($bdd);
    }
  }

  /**
   * Accesseur = Getter
   * Mutateur = Setter
   */
  public static function getId(): int{
    return self::$id;
  }

  public static function setId(int $id): void{
    self::$id = $id;
  }
  
  public static function getTitle(): string{
    return self::$title;
  }
  
  public static function setTitle(string $title): void{
    self::$title = $title;
  }
  
  public static function getContent(): string{
    return self::$content;
  }
  
  public static function setContent(string $content): void{
    self::$content = $content;
  }
  
  public static function getAuthor(): string{
    return self::$author;
  }
  
  public static function setAuthor(string $author): void{
    self::$author = $author;
  }
  
  public static function getCreatedDate(): \Datetime{
    $date = new \Datetime(self::$created_date);
    return $date;
  }
  
  public static function setCreatedDate(string $created_date): void{
    self::$created_date = $created_date;
  }
  
  public static function getModificationDate(): \Datetime{
    $date = new \Datetime(self::$modification_date);
    return $date;
  }
  
  public static function setModificationDate(string $modification_date): void{
    self::$modification_date = $modification_date;
  }

  public static function setAllParams($params){
    [
      "ID" => $id,
      "Title" => $title,
      "Content" => $content,
      "Author" => $author,
      "Created_date" => $created_date,
      "Modification_date" => $modification_date,
    ] = get_object_vars($params);
    self::setId($id) ;
    self::setTitle($title);
    self::setContent($content);
    self::setAuthor($author);
    self::setCreatedDate($created_date);
    self::setModificationDate($modification_date);
  }

  public static function add(string $title, string $content, string $author): void{

    try{
        // Création de la PDO pour la connexion avec la bdd
      $req = self::$bdd->prepare("INSERT INTO articles(title, content, author) VALUES(:title, :content, :author)");
      $req->bindValue(":title", $title, \PDO::PARAM_STR);
      $req->bindValue(":content", $content, \PDO::PARAM_STR);
      $req->bindValue(":author", $author, \PDO::PARAM_STR);

      if(!$req->execute()){
        Utils::launchException("Une erreur s'est produite lors de l'ajout d'un article.");
      }

    }catch(\Exception $e){
      Utils::readException($e);
    }

  }

  public static function getList(){
    try{

        $req = self::$bdd->prepare("SELECT * FROM articles ORDER BY id ASC");

        if(!$req->execute()){
            Utils::launchException("Une erreur s'est produite lors de la récupération de la liste");
        }

        $articles = $req->fetchAll(\PDO::FETCH_OBJ);
        $req->closeCursor();
        
        if(!$articles){
            Utils::launchException("Aucun article n'a été trouvé");
        }

        return $articles;

    }catch(\Exeption $e){
        Utils::readException($e);
    }
  }
  
  public static function getById(int $id){
    try{

        $req = self::$bdd->prepare("SELECT * FROM articles WHERE id = :id");
        $req->bindValue(":id", $id, \PDO::PARAM_INT);

        if(!$req->execute()){
            Utils::launchException("Une erreur s'est produite lors de la récupération de l'article");
        }

        $article = $req->fetch(\PDO::FETCH_OBJ);

        if(!$article){
            Utils::launchException("L'article ciblé n'a pas été trouvé");
        }

        self::setAllParams($article);

        return $article;

    }catch(\Exception $e){
        Utils::readException($e);
    }
  }

  public static function Update(int $id, string $title, string $content, string $author, string $created_date){
    try{

        $req = self::$bdd->prepare("UPDATE articles SET title=:title,content=:content, author=:author, created_date=:created_date WHERE id=:id");
        $req->bindValue(":id", $id, \PDO::PARAM_INT);
        $req->bindValue(":title", $title, \PDO::PARAM_STR);
        $req->bindValue(":content", $content, \PDO::PARAM_STR);
        $req->bindValue(":author", $author, \PDO::PARAM_STR);
        $req->bindValue(":created_date", $created_date, \PDO::PARAM_STR);

        if(!$req->execute()){
            Utils::launchException("Une erreur s'est produite lors de la mise à jour de l'article");
        }

    }catch(\Exception $e){
        Utils::readException($e); 
    }

    return true;
  }

  public static function deleteAll(){
    return self::$bdd->exec("DELETE FROM articles"); // Supprime toutes les données de la table articles 
  }

  public static function deleteArticle(int $id){
    return self::$bdd->exec("DELETE FROM articles WHERE id=$id");
  }

  //Créer les méthodes BDD
  public static function setBdd($bdd){
    self::$bdd = $bdd;
  }
}