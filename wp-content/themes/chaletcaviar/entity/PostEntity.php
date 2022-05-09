<?php

class PostEntity {

    protected $post;

    public function __construct(WP_Post $post)
    {
        $this->post = $post;

    }

    public function getPostName(): string
    {
        return $this->post->post_title;
    }

}