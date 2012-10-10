<?php
// 1. 데이터베이스 서버에 접속
$link=mysql_connect('localhost','root','111111');
if(!$link) {
die('Could not connect: '.mysql_error());
}
// 2. 데이터베이스 선택
mysql_select_db('opentutorials');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");
if(!empty($_GET['id'])) {
    $sql="SELECT * FROM topic WHERE id = ".$_GET['id'];
    $result = mysql_query($sql);
    $topic = mysql_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    <style type="text/css">
        body {
            font-size:0.8em;    
            font-family: dotum;
            line-height:1.6em;
        }
        body.black{
            background-color: black;
            color:white;
        }
        body.black a{
            color:white;
        }
        body.black a:hover{
            color:#f60;
        }
        body.black header{
            border-bottom:1px solid #333;
        }
        body.black nav {
            border-right: 1px solid #333;
        }
        header{
            border-bottom:1px solid #ccc;
            padding: 20px 0; }
        #toolbar {
            padding:10px;
            float:right;
        }
        nav{
            float:left;
            margin-right: 20px;
            min-height: 500px;
            border-right:1px solid #ccc;
        }
        nav ul{
            list-style:none;
            padding-left:0;
            padding-right:20px;
        }
        article{
            float:left;
        }
        footer{
            clear:both;
        }
        a {
            text-decoration:none;
        }
        a:link,
        a:visited{
            color:#333;
        }
        a:hover {
            color:#f60;
        }
        h1 {
            font-size:1.4em;
        }
        /*php테스트 스타일*/
       .bbb{
       	color:black;
    	}
    	.aaa{
    		color:red;
    	}  
    </style>
    </head>
  
    <body id="body">
        <div>
            <header>
            	
            	  <h1>
                  테스트 01. if로 현메뉴 선택후 나머지메뉴 : 나머지가 오른쪽에 표시됨
                </h1>
                
                <a href="index_if.php" style="color:blue; display:inline;">
                	(버전 초기화하기)
				  </a>
				  <br/>
                <a href="index.php" style="color:blue; display:inline;">
           			(테스트 목록 돌아가기)
           	  </a>
           	  
            </header>
            <div id="toolbar">
                <input type="button" value="black" onclick="document.getElementById('body').className='black'" />
                <input type="button" value="white" onclick="document.getElementById('body').className='white'" />
            </div>
            <nav>
                <ul>
                    <?php
                    $sql="select id,title from topic";
                    $result=mysql_query($sql);
					//원래문구
                    // while($row=mysql_fetch_assoc($result)) {
                    // echo "<li><a href=\"?id={$row['id']}\">{$row['title']}</a></li>";
                    //신규문구         
						while($row=mysql_fetch_assoc($result)) {
          					if ( $row['id'] == $_GET['id'] ){
          						echo "
          							<li> 
                        				<a href=\"?id={$row['id']}\">
                             				'셀렉트' {$row['title']}</div>
                        				</a>
                   				</li>  				
             					"
								;
								continue;
          					} 
              				echo "
          							<li>
                        				<a href=\"?id={$row['id']}\">
                             				'안셀렉트' {$row['title']}
                        				</a>
                   				</li>  				
             					"
              					;
								continue;
							 
    				}
                    ?>
                </ul>
            </nav>
            <article>
                <h2><?=$topic['title']?></h2>
                <div>
                    <?=$topic['description']?>
                </div>
            </article>
        </div>
    </body>
</html>