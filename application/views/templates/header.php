<link href="<?php echo base_url();?>assets/css/boot.css rel="stylesheet">
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <link rel="stylesheet"href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
>
</head>
<style>
body {
font-family: "Lato", sans-serif;
}

.sidenav {
height: 100%;
width: 150px;
position: fixed;
z-index: 1;
top: 0;
left: 0;
background-color: #111;
overflow-x: hidden;
padding-top: 12px;				   

}

.sidenav a {
padding: 6px 6px 6px 32px;
text-decoration: none;
font-size: 18px;
color: #818181;
display: block;
}

.sidenav a:hover {
color: #f1f1f1;
}

.main {
margin-left: 200px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
.sidenav {padding-top: 15px;}
.sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
    <a href="http://projektstojkapda.maweb.eu/projekt/index.php/udalosti">Domov</a>
    <a href="http://projektstojkapda.maweb.eu/projekt/index.php/rodinne_oslavy">Rodinné oslavy</a>
    <a href="http://projektstojkapda.maweb.eu/projekt/index.php/zamestnanci">Zamestnanci</a>
    <a href="http://projektstojkapda.maweb.eu/projekt/index.php/uloha_zamestnancov">Ponuky zamestnancov</a>
    <a href="http://projektstojkapda.maweb.eu/projekt/index.php/miesta">Dostupné miesta</a>

    <a href="http://projektstojkapda.maweb.eu/projekt/index.php/moznosti_platby">Možnosti platby</a>
    <a href="http://projektstojkapda.maweb.eu/projekt/index.php/zakaznici">Zákazníci</a>
</div>



</body>
</html>