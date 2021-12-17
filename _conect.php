<?php
session_start();
$SITE = 'https://www.muraldaescola.com.br';
$ENDPOINT = "API/webservice.php";

define('HOST', 'localhost:3306');
define('DB', 'muraldae_MURAL_PRINCIPAL');
define('USER', 'muraldae_phelipeviana');
define('PASS', '5qX--Bt+z5k#');




$conn = mysqli_connect(HOST, USER, PASS, DB) or die(mysqli_errno($i));
mysqli_set_charset($conn, "utf8");

$URL_AUTORIZADA = [
	'muraldaescola.com.br'
];



function AUTORIZATION($METODO_AUTORIZADO = " ")
{
	global $URL_AUTORIZADA;
	$URL_REQUISITADA = $_SERVER['HTTP_REFERER'];
	$METODO_REQUISICAO = $_SERVER['REQUEST_METHOD'];


	if ($METODO_AUTORIZADO == " ") {

		$RETORNO['STATUS'] = true;
		$RETORNO['MSG'] = 'AUTORIZADO ALL METHODS';
	} else {
		$expl = explode("//", $URL_REQUISITADA);
		$exp2 = explode("/", $expl[1]);
		$BASE = $exp2[0];


		if (in_array($BASE, $URL_AUTORIZADA)) {

			if ($METODO_REQUISICAO == $METODO_AUTORIZADO) {
				$RETORNO['STATUS'] = true;
				$RETORNO['MSG'] = 'AUTORIZADO';
			} else {
				$RETORNO['STATUS'] = false;
				$RETORNO['MSG'] = 'ERROR METHOD';
			}
		} else {
			$RETORNO['STATUS'] = false;
			$RETORNO['MSG'] = 'BAD REQUEST';
		}
	}



	return $RETORNO;
}

function quizProjetoVerificate($id_quiz, $token)
{
	global $conn;
	$sql = "SELECT Q.REF_PROJETO_QUIZ,P.id_projeto, P.token_gestor_projeto FROM `quiz` as Q 
	LEFT join projeto as P 
	ON Q.REF_PROJETO_QUIZ=P.id_projeto
	WHERE Q.id_quiz='$id_quiz' AND P.token_gestor_projeto='$token'";
	$exe = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($exe);
	if ($num > 0) {
		return true;
	} else {
		return false;
	}
}
function urlInjection($i)
{
	$string = noInjection($i);

	$proibidos = ['DELETE', 'UPDATE', '=', 'SELECT', 'FROM', '*'];
	if (in_array(strtoupper($string), $proibidos)) {
		$string = -1;
	}

	return 	preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç|Ç)/"), explode(" ", "A A E E I I O O U U N N C C"), $string);
}

function noInjection($i)
{
	global $conn;

	$primeiro = trim($i);
	$segundo = htmlspecialchars($primeiro);
	$terceiro = mysqli_real_escape_string($conn, $segundo);

	return $terceiro;
}

function isEmail($email)
{
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}



function SemAcentos($string)
{
	return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç|Ç)/"), explode(" ", "a A e E i I o O u U n N C c"), $string);
}



function protect($i)
{
	if ($_SESSION['acesso'] != $i) {
		// Se houver invasão via GET quebrar a session
		header("Location:_deslogar.php");
	}
}
function GerarSenha()
{
	$a = rand(10, 99);
	$b = rand(10, 99);
	$c = rand(10, 99);

	return $a . $b . $c;
}

function nomeCase($string, $delimiters = array(" ", "-", ".", "'", "O'", "Mc"), $exceptions = array("de", "da", "dos", "das", "do", "I", "II", "III", "IV", "V", "VI"))
{

	$string = mb_convert_case($string, MB_CASE_TITLE, "UTF-8");
	foreach ($delimiters as $dlnr => $delimiter) {
		$words = explode($delimiter, $string);
		$newwords = array();
		foreach ($words as $wordnr => $word) {
			if (in_array(mb_strtoupper($word, "UTF-8"), $exceptions)) {
				// check exceptions list for any words that should be in upper case
				$word = mb_strtoupper($word, "UTF-8");
			} elseif (in_array(mb_strtolower($word, "UTF-8"), $exceptions)) {
				// check exceptions list for any words that should be in upper case
				$word = mb_strtolower($word, "UTF-8");
			} elseif (!in_array($word, $exceptions)) {
				// convert to uppercase (non-utf8 only)
				$word = ucfirst($word);
			}
			array_push($newwords, $word);
		}
		$string = join($delimiter, $newwords);
	} //foreach
	return $string;
}

function primeiroNome($name)
{
	$explode = explode(" ", $name);
	$primeiro = $explode[0];
	return $primeiro;
}
