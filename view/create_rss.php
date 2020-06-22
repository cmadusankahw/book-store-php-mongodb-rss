<?php
   session_start();
 
    $rssfeed = '<?xml version="1.0" encoding="ISO-8859-1"?>';
    $rssfeed .= '<rss version="2.0">';
    $rssfeed .= '<channel>';
    $rssfeed .= '<title>Book Store Matara RSS Feed</title>';
    $rssfeed .= '<link>http://localhost:8100/</link>';
    $rssfeed .= '<description>This is an example RSS feed</description>';
    $rssfeed .= '<language>en-us</language>';
 
    require "config.php";

    $books = $collection->find();
 

    foreach($books as $book) {
 
        $rssfeed .= '<item>';
        $rssfeed .= '<title>'  . $book->title . '</title>';
        $rssfeed .= '<description>' . $book->description . '</description>';
        $rssfeed .= '<author>' . $book->author . '</author>';
        $rssfeed .= '<pubDate>' . date("D, d M Y H:i:s O", strtotime($date)) . '</pubDate>';
        $rssfeed .= '</item>';
    }
 
    $rssfeed .= '</channel>';
    $rssfeed .= '</rss>';
 
    print_r($rssfeed);
?>