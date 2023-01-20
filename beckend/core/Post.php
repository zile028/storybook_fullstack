<?php

class Post extends Connection
{

    public function userPosts($id)
    {
        $sql = "SELECT p.id AS id, p.title AS title, text,image, category_id, p.created_at AS created_at, p.updated_at AS updated_at,
                        c.name AS category, v.name as visibility,
                        u.first_name AS first_name, u.last_name AS last_name
                FROM posts p
                JOIN category c ON c.id = p.category_id
                JOIN visibility v ON v.id = p.visibility_id
                JOIN users u ON u.id = p.user_id
                WHERE user_id = :id
                ORDER BY p.created_at DESC
                ";
        $query = $this->db->prepare($sql);
        $query->execute(["id" => $id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategory()
    {
        $sql = "SELECT * FROM category";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getVisibility()
    {
        $sql = "SELECT * FROM visibility";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function addPost($data)
    {
        $sql = "INSERT INTO posts 
                (title, text, image, category_id, user_id, visibility_id)
                VALUES (:title, :text, :image, :category_id, :user_id, :visibility_id)";
        $query = $this->db->prepare($sql);
        $query->execute($data);
        if ($query->rowCount() === 1) {
            return true;
        }
        return false;
    }

    public function getPost($id)
    {
        $sql = "SELECT p.id AS id, p.title AS title, text,image, category_id, p.created_at AS created_at, p.updated_at AS updated_at, p.user_id, visibility_id,
                        c.name AS category, v.name as visibility,
                        u.first_name AS first_name, u.last_name AS last_name
                FROM posts p
                JOIN category c ON c.id = p.category_id
                JOIN visibility v ON v.id = p.visibility_id
                JOIN users u ON u.id = p.user_id
                WHERE p.id = :id
                ORDER BY p.created_at DESC
                ";
        $query = $this->db->prepare($sql);
        $query->execute(["id" => $id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function deletePost($id)
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(["id" => $id]);
        if ($query->rowCount() === 1) {
            return true;
        }
        return false;
    }

    public function removeImage($id)
    {
        $sql = "UPDATE posts SET image = NULL, updated_at = NOW() WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(["id" => $id]);
    }

    public function updatePost($data)
    {
        $sql = "UPDATE posts SET
                 title = :title,
                 text=:text,
                 image=:image,
                 category_id=:category_id,
                 visibility_id = :visibility_id,
                 user_id=:user_id,
                 updated_at = NOW()
                WHERE id = :id
                 ";
//        dd($data);
        $query = $this->db->prepare($sql);
        $query->execute($data);
        if ($query->rowCount() === 1) {
            return true;
        }
        return false;
    }

    public function getPublic()
    {
        $sql = "SELECT p.id AS id, p.title AS title, text,image, category_id, p.created_at AS created_at, p.updated_at AS updated_at, p.user_id, visibility_id,
                        c.name AS category, v.name as visibility, COUNT(vo.id) AS voting_count,
                        u.first_name AS first_name, u.last_name AS last_name
                FROM posts p
                JOIN category c ON c.id = p.category_id
                JOIN visibility v ON v.id = p.visibility_id
                JOIN users u ON u.id = p.user_id
                LEFT JOIN voting vo ON vo.post_id = p.id 
                WHERE v.name = :v_name
                GROUP BY vo.post_id,p.id
                ORDER BY p.created_at DESC
                ";
        $query = $this->db->prepare($sql);
        $query->execute(["v_name" => "public"]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPublicPostByCategory($category_id)
    {
        $sql = "SELECT p.id AS id, p.title AS title, text,image, category_id, p.created_at AS created_at, p.updated_at AS updated_at, p.user_id, visibility_id,
                        c.name AS category, v.name as visibility, COUNT(vo.id) AS voting_count,
                        u.first_name AS first_name, u.last_name AS last_name
                FROM posts p
                JOIN category c ON c.id = p.category_id
                JOIN visibility v ON v.id = p.visibility_id
                JOIN users u ON u.id = p.user_id
                LEFT JOIN voting vo ON vo.post_id = p.id
                WHERE v.name = :v_name AND p.category_id = :category_id
                GROUP BY vo.post_id,p.id
                ORDER BY p.created_at DESC
                ";
        $query = $this->db->prepare($sql);
        $query->execute([
            "v_name" => "public",
            "category_id" => $category_id
        ]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPublicUserPost($user_id)
    {
        $sql = "SELECT p.id AS id, p.title AS title, text,image, category_id, p.created_at AS created_at, p.updated_at AS updated_at, p.user_id, visibility_id,
                        c.name AS category, v.name as visibility, COUNT(vo.id) AS voting_count,
                        u.first_name AS first_name, u.last_name AS last_name
                FROM posts p
                JOIN category c ON c.id = p.category_id
                JOIN visibility v ON v.id = p.visibility_id
                JOIN users u ON u.id = p.user_id
                LEFT JOIN voting vo ON vo.post_id = p.id
                WHERE v.name = :v_name AND p.user_id = :user_id
                GROUP BY vo.post_id,p.id
                ORDER BY p.created_at DESC
                ";
        $query = $this->db->prepare($sql);
        $query->execute(["v_name" => "public", "user_id" => $user_id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function voting($post_id, $user_id)
    {
        $sql = "SELECT id FROM voting WHERE user_id = :user_id AND post_id = :post_id";
        $query = $this->db->prepare($sql);
        $query->execute([
            "user_id" => $user_id,
            "post_id" => $post_id
        ]);
        if ($query->rowCount() === 0) {
            $sql = "INSERT INTO voting (post_id,user_id) VALUES (:post_id,:user_id)";
        } else {
            $sql = "DELETE FROM voting WHERE post_id = :post_id AND user_id = :user_id";
        }
        $query = $this->db->prepare($sql);
        $query->execute([
            "user_id" => $user_id,
            "post_id" => $post_id
        ]);
    }

    public function getAllPost()
    {
        $sql = "SELECT p.id AS id, p.title AS title, text,image, category_id, p.created_at AS created_at, p.updated_at AS updated_at, p.user_id, visibility_id,
                        c.name AS category, v.name as visibility,
                        u.first_name AS first_name, u.last_name AS last_name
                FROM posts p
                JOIN category c ON c.id = p.category_id
                JOIN visibility v ON v.id = p.visibility_id
                JOIN users u ON u.id = p.user_id
                ORDER BY p.created_at DESC
                ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}

$Post = new Post(config);