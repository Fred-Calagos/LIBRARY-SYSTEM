<?php
    include "../../inc/header.php";
?>

<div class="home">

<ul class="nav-search-add">
        <li class="li2"><form action=""><input type="text" name="search-books" id="search-user" placeholder="SEARCH" style="border-right:thin solid black;"><i class="fas fa-search"></i></form></li>
    </ul>
    <!--Read Book Table area-->
    <!-- FIXME: need ug edit sa table , kuhaan -->
    <br><br>
    <div id="result-user"></div>
    <script>
            $(document).ready(function(){

                load_data();

                    function load_data(query)
                        {
                            $.ajax({
                                    url:"auto-search-user.php",
                                    method:"POST",
                                    data:{query:query},
                                    success:function(data)
                                    {
                                        $('#result-user').html(data);
                                    }
                                });
                        }
                    $('#search-user').keyup(function(){
                        var search = $(this).val();
                            if(search != '')
                                {
                                    load_data(search);
                                }
                                else
                                {
                                    load_data();
                                }
                            });
                        });
        </script>

</div>