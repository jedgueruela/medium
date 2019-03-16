<?php

if (! function_exists('article_image_path')) {
	/**
	 * Path to article image directory
	 *
	 * @return string
	 */
    function article_image_path($articleId)
    {
        return public_path('/photos/articles/' . $articleId . '/');
    }
}