<?php
//session elindítása
//import

$felh = new User();
$felhAzon = $_SESSION('felhAzon');

if (!$felh->get_session()){
    header ("location:login.php");
}

if (isset($_GET['q'])){
    $felh->kijelentkezes();
    header ("location:login.php");
}
//ha nincs bejelentkezve a felhasználó, akkor a bejelentkezéshez ugorjon!

//url-ben állapottartás: ha rákattintott a kijelentkezésre, akkor
//kijelentkeztetés után ugorjon a bejelentkezés oldalra!
?>

<!DOCTYPE html>
<html lang="hu-HU">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home page</title>
    </head>
    <body>
        <main>
            <div>
				<h1>Hello <?php $felh->get_nev($felhAzon);?>!</h1>
            </div>
			<div>
				<a href="home.php?q=logout">Kijelentkezés</a>
			</div>
			<?php
				if ($felh->isAdmin($felhAzon))
                {
                    echo "<h2>Bejelentkezett felhasználók:</h2>";
                    $matrix = $felh->aktivok();
                    $felh->megjelenit_aktivok($matrix);
                }
			?>
        </main>
    </body>
</html>