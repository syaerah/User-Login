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
    }