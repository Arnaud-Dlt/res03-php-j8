<?php 
class PostCategory {
    private ? int $id ;
    private string $name ;
    private string $description ;
    private array $posts ;
    
    
    public function __construct(string $name, string $description)
    {
        $this-> id = null;
        $this-> name = $name;
        $this-> description = $description;
        $this-> posts = [];
    }
    
    
    /// GETTER
    
    public function getId() : ? int
    {
        return $this->id;
    }
    
    public function getName() : string
    {
        return $this->name;
    }
    
    public function getDescription() : string
    {
        return $this->description;
    }
    
    public function getPosts() : array
    {
        return $this->posts;
    }
    
    /// SETTER
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function setName(string $name) : void
    {
        $this->name = $name;
    }
    
    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }
    
    public function setPosts(string $posts) : void
    {
        $this->email = $email;
    }
    
    
    /// METHOD
    
    public function addPost(Post $posts): array 
    {
        
    }
    
    public function removePost(Post $post) : array
    {
        
    }

?>