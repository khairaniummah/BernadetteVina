<?php
class protif
{
    function index()
    {
        $con=mysqli_connect("127.0.0.1","root","12","RameTerus");
        $result = mysqli_query($con,"SELECT * FROM Menu");
        return $result;
    }
    
    function harga($harga)
    {
        $con=mysqli_connect("127.0.0.1","root","12","RameTerus");
        $result = mysqli_query($con,"SELECT * FROM Menu WHERE Harga = $harga");
        return $result;
    }
    
    function id($id)
    {
        $con=mysqli_connect("127.0.0.1","root","12","RameTerus");
        $result = mysqli_query($con,"SELECT * FROM Menu WHERE id = $id");
        return $result;
    }
    
    function menu($menu)
    {
        $con=mysqli_connect("127.0.0.1","root","12","RameTerus");
        $result = mysqli_query($con,"SELECT * FROM Menu WHERE Nama = \"$menu\" ");
        return $result;
    }
    
    
}
