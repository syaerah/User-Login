 <?php
    class Post{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getPosts(){
            $this->db->query('SELECT *,
                            posts.id as postId,
                            users.id as userId,
                            posts.create_at as postCreate,
                            users.create_at as userCreate
                            FROM posts
                            INNER JOIN users
                            ON posts.user_id = users.id
                            ORDER BY posts.create_at DESC
                            ');

            $result = $this->db->resultSet();

            return $result;
        }

        public function addPost($data){
            $this->db->query('INSERT INTO posts (title, user_id, body, is_anonymous) VALUES (:title, :user_id, :body, :is_anonymous)');
            //bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':is_anonymous', $data['is_anonymous']);

            //execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updatePost($data){
            $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
            //bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':is_anonymous', $data['is_anonymous']);

            //execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getPostById($id){
            $this->db->query('SELECT * FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function deletePost($id){
            $this->db->query('DELETE FROM posts WHERE id = :id');
            //bind values
            $this->db->bind(':id', $id);

            //execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }