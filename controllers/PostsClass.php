<?php

class PostsClass{
    use DataBaseClass;

    protected $post_id;
    protected $post_title;
    protected $post_description;
    protected $post_featured_image;
    protected $post_video_link;
    protected $response = [];

    public function get_all_posts(){

        $connection = $this->open_connection();

        // check if post was made;
        $sql = "SELECT * FROM posts_table ORDER BY created_at DESC";
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            $this->response = [];
        }else{
            while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                $this->response[] = $row;
            }
            
        }
        $connection = $this->close_connection();
        return json_encode($this->response);
    }

    public function new_post($post_id, $post_title, $post_description, $post_featured_image, $post_video_link){
        $this->post_id = $post_id;
        $this->post_title = strtoupper($post_title);
        $this->post_description = $post_description;
        $this->post_featured_image = $post_featured_image;
        $this->post_video_link = $post_video_link;

        $connection = $this->open_connection();

        // check if post was made;
        $sqlChk = "SELECT * FROM posts_table WHERE post_id = :post_id OR post_title = :post_title";
        $stmtChk = $connection->prepare($sqlChk);
        $stmtChk->bindValue(":post_id", $post_id, PDO::PARAM_STR);
        $stmtChk->bindValue(":post_title", $post_title, PDO::PARAM_STR);
        $stmtChk->execute();

        if($stmtChk->rowCount() > 0){
            $this->response = [
                'status' => 201,
                'msg' => 'Post already submitted'
            ];
        }else{
            try{

                $sqlIns = "INSERT INTO posts_table(post_id, post_title, post_description, post_featured_image, post_video_link) VALUES(:id, :title, :description, :featured, :video)";
                $stmtIns = $connection->prepare($sqlIns);
                $stmtIns->bindValue(":id", $post_id, PDO::PARAM_STR);
                $stmtIns->bindValue(":title", $post_title, PDO::PARAM_STR);
                $stmtIns->bindValue(":description", $post_description, PDO::PARAM_STR);
                $stmtIns->bindValue(":featured", $post_featured_image, PDO::PARAM_STR);
                $stmtIns->bindValue(":video", $post_video_link, PDO::PARAM_STR);
                $stmtIns->execute();

                $this->response = [
                    'status' => 200,
                    'msg' => 'Post created and published successfully'
                ];

            }catch(\Exception $th){
                $this->response = [
                    'status' => 201,
                    'msg' => 'Something went wrong. Details : ' . $th->getMessage()
                ];
            }
        }
        $connection = $this->close_connection();
        return json_encode($this->response);
    }

    public function get_post_data($post_id){
        $this->post_id = $post_id;

        $connection = $this->open_connection();

        // check if post was made;
        $sql = "SELECT * FROM posts_table WHERE post_id = :post_id";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":post_id", $post_id, PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            $this->response = [];
        }else{
            $row = $stmt->fetch(PDO::FETCH_OBJ);
            $this->response = $row;
        }
        $connection = $this->close_connection();
        return json_encode($this->response);
    }

    public function update_post($post_id, $post_title, $post_description, $post_featured_image, $post_video_link){
        $this->post_id = $post_id;
        $this->post_title = strtoupper($post_title);
        $this->post_description = $post_description;
        $this->post_featured_image = $post_featured_image;
        $this->post_video_link = $post_video_link;

        $connection = $this->open_connection();

        try{

            $sqlUpdate = "UPDATE posts_table set post_title = :title, post_description = :description, post_featured_image = :featured, post_video_link = :video WHERE post_id = :id";
            $stmtUpdate = $connection->prepare($sqlUpdate);
            $stmtUpdate->bindValue(":id", $post_id, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":title", $post_title, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":description", $post_description, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":featured", $post_featured_image, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":video", $post_video_link, PDO::PARAM_STR);
            $stmtUpdate->execute();

            $this->response = [
                'status' => 200,
                'msg' => 'Post updated and published successfully'
            ];

        }catch(\Exception $th){
            $this->response = [
                'status' => 201,
                'msg' => 'Something went wrong. Details : ' . $th->getMessage()
            ];
        }
        $connection = $this->close_connection();
        return json_encode($this->response);
    }

    public function delete_post($post_id){
        $this->post_id = $post_id;

        $connection = $this->open_connection();

        try{

            $sqlUpdate = "DELETE FROM posts_table WHERE post_id = :id";
            $stmtUpdate = $connection->prepare($sqlUpdate);
            $stmtUpdate->bindValue(":id", $post_id, PDO::PARAM_STR);
            $stmtUpdate->execute();

            $this->response = [
                'status' => 200,
                'msg' => 'Post deleted successfully'
            ];

        }catch(\Exception $th){
            $this->response = [
                'status' => 201,
                'msg' => 'Something went wrong. Details : ' . $th->getMessage()
            ];
        }
        $connection = $this->close_connection();
        return json_encode($this->response);
    }    
}