	<!DOCTYPE HTML>
	<html>
	<body>
	<head>Assignment 4</head><br>
<head>
  <title>Hiragana Tutor</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

  <div class="header">
  	<h2>Logout</h2>
  </div>
	<?php include('../web-service/logout.php') ?>	 
  <form method="post">
  	<div class="input-group">
  		<button type="submit" class="btn" name="logout_btn">Logout</button>
  	</div>
  	<script type="text/javascript">


            $("#logout_btn").click(function() {
                $.ajax({
                    url: '../web-service/logout.php?argument=logOut',
                    success: function(data){
                        window.location.href = data;
                    }
                });
            });


  	</script>

</html>
	<br><br>
	<button onclick="NQuizRK()">New quiz(Romaji -> kana)</button>
	<button onclick="NQuizKR()">New quiz(kana -> Romaji)</button>
	<br>
	<strong>Remove vowels from Quiz</strong>
	<br>
	<input type="checkbox" id="removeA" value="a">remove 'a'<br>
	<input type="checkbox" id="removeE" value="e">remove 'e'<br>
	<input type="checkbox" id="removeI" value="i">remove 'i'<br>
	<input type="checkbox" id="removeO" value="o">remove 'o'<br>
	<input type="checkbox" id="removeU" value="u">remove 'u'<br>

	<script>









		var score=0;
		var QCount=0;

		var romaji = [
				"a",
				"e",
				"i",				
				"o",				
				"u",				
				"ha",
				"he",
				"hi",
				"ho",
				"hu",
				"ka",
				"ke",
				"ki",
				"ko",
				"ku",
				"ma",
				"me",
				"mi",
				"mo",
				"mu",
				"n",
				"na",
				"ne",
				"ni",
				"no",
				"nu",
				"ra",
				"re",
				"ri",
				"ro",
				"ru",
				"sa",
				"se",
				"si",
				"so",
				"su",
				"ta",
				"te",
				"ti",
				"to",
				"tu",
				"wa",
				"wo",
				"ya",
				"yo",
				"yu",
			]


			var images = [
				"../Hiraganas/staticImages/a.png",
				"../Hiraganas/staticImages/e.png",
				"../Hiraganas/staticImages/i.png",
				"../Hiraganas/staticImages/o.png",
				"../Hiraganas/staticImages/u.png",
				"../Hiraganas/staticImages/ha.png",
				"../Hiraganas/staticImages/he.png",
				"../Hiraganas/staticImages/hi.png",
				"../Hiraganas/staticImages/ho.png",
				"../Hiraganas/staticImages/hu.png",
				"../Hiraganas/staticImages/ka.png",
				"../Hiraganas/staticImages/ke.png",
				"../Hiraganas/staticImages/ki.png",
				"../Hiraganas/staticImages/ko.png",
				"../Hiraganas/staticImages/ku.png",
				"../Hiraganas/staticImages/ma.png",
				"../Hiraganas/staticImages/me.png",
				"../Hiraganas/staticImages/mi.png",
				"../Hiraganas/staticImages/mo.png",
				"../Hiraganas/staticImages/mu.png",
				"../Hiraganas/staticImages/n.png",
				"../Hiraganas/staticImages/na.png",
				"../Hiraganas/staticImages/ne.png",
				"../Hiraganas/staticImages/ni.png",
				"../Hiraganas/staticImages/no.png",
				"../Hiraganas/staticImages/nu.png",
				"../Hiraganas/staticImages/ra.png",
				"../Hiraganas/staticImages/re.png",
				"../Hiraganas/staticImages/ri.png",
				"../Hiraganas/staticImages/ro.png",
				"../Hiraganas/staticImages/ru.png",
				"../Hiraganas/staticImages/sa.png",
				"../Hiraganas/staticImages/se.png",
				"../Hiraganas/staticImages/si.png",
				"../Hiraganas/staticImages/so.png",
				"../Hiraganas/staticImages/su.png",
				"../Hiraganas/staticImages/ta.png",
				"../Hiraganas/staticImages/te.png",
				"../Hiraganas/staticImages/ti.png",
				"../Hiraganas/staticImages/to.png",
				"../Hiraganas/staticImages/tu.png",
				"../Hiraganas/staticImages/wa.png",
				"../Hiraganas/staticImages/wo.png",
				"../Hiraganas/staticImages/ya.png",
				"../Hiraganas/staticImages/yo.png",
				"../Hiraganas/staticImages/yu.png",
			];

		function play(a)
		{
			var sound = new Audio(a);
			sound.play();
		}

		function NQuizRK()
		{
			document.getElementById("testgrade").style.display = "none";
			document.getElementById("nextQuestion").style.display = "none";
			QCount = 0;
			score=0;
			QuizRK();
		}

		function QuizRK()
		{
			var x = document.getElementById("bigTable");
			var quizT  =document.getElementById("quizTable");
				let A = document.getElementById("removeA");
				let E = document.getElementById("removeE");
				let I = document.getElementById("removeI");
				let O = document.getElementById("removeO");
				let U = document.getElementById("removeU");

			let Nromaji=romaji.slice(0);
			let Nimages=images.slice(0);

			for(var i =0; i< Nromaji.length;i++)
			{
				if(A.checked==true && Nromaji[i].includes('a'))
				{
					Nromaji.splice(i,1);
					Nimages.splice(i,1);i=-1;
				}
				else if(E.checked==true && Nromaji[i].includes('e'))
				{
					Nromaji.splice(i,1);
					Nimages.splice(i,1);i=-1;
				}
				else if(I.checked==true && Nromaji[i].includes('i'))
				{
					Nromaji.splice(i,1);
					Nimages.splice(i,1);i=-1;
				}
				else if(O.checked==true && Nromaji[i].includes('o'))
				{
					Nromaji.splice(i,1);
					Nimages.splice(i,1);i=-1;
				}
				else if(U.checked==true && Nromaji[i].includes('u'))
				{
					Nromaji.splice(i,1);
					Nimages.splice(i,1);i=-1;
				}
			}if(Nromaji.length<12)
			{
				quizT.rows[0].cells[1].innerHTML="remove less elements";
				return;
			}
			x.style.display = "none";

			var Rkey = Math.floor((Math.random()*Nromaji.length));

			var Question = Nromaji[Rkey];

			var image1; var image2; var image3; var image4;

			for(var i=0; i<4; i++)
			{//select answer in image1, 3 other randoms
					image1= Nimages[Rkey];
				do
				{
					image2= Nimages[Math.floor((Math.random()*Nromaji.length))];
				}while(image2==image1)
				do
				{
					image3= Nimages[Math.floor((Math.random()*Nromaji.length))];
				}while(image3==image2 ||image3==image1)
				do
				{
					image4= Nimages[Math.floor((Math.random()*Nromaji.length))];
				}while(image4==image3||image4==image2 ||image4==image1)
			}
			document.getElementById("instructions").innerHTML="<br>click on the kana element that matches the romaji!";

			var answers = [image1, image2, image3, image4];
			//shuffle images
			var swap = Math.floor((Math.random() * 4));
			var holder = answers[swap];
			answers[swap] = answers[0];
			answers[0] = holder;

			var table = document.getElementById("quizTable");
			table.rows[0].cells[0].innerHTML = Question;
			for(var i = 0; i<table.rows.length; i++)
    		{
    			let row = table.rows[i];
    			row.cells[1].innerHTML="<img src='"+answers[i]+"' class = 'quizImage'>";
    		}
			for(var i = 0; i<table.rows.length; i++)
    		{
    			let row = table.rows[i];
    			if(i===swap)
    			{
    				row.cells[1].onclick=function(){rightRK()};
    			} else{
    				row.cells[1].onclick=function(){wrongRK()};
    			}
    		}

		}
		function wrongRK()
		{

			var div1 = document.getElementById("testgrade");
			var div2 = document.getElementById("nextQuestion");
			document.getElementById("testgrade").style.display = "";
			document.getElementById("nextQuestion").style.display = "";
			if(QCount<10)
			{
				div1.innerHTML = "INCORRECT!  score is "+score*10 +"%";
				div2.innerHTML = 9-QCount +" Questions Left<button onclick='nextKR()'>nextQuestion</button>";
			}
			else{
				div2.innerHTML="Test is Finished";
			}
			QCount++;
		}
		function rightRK()
		{
			score++;
			var div1 = document.getElementById("testgrade");
			var div2 = document.getElementById("nextQuestion");
			document.getElementById("testgrade").style.display = "";
			document.getElementById("nextQuestion").style.display = "";

			if(QCount<10)
			{
				div1.innerHTML = "CORRECT!  score is "+score*10 +"%";
				div2.innerHTML = 9-QCount+" Questions Left<button onclick='nextKR()'>nextQuestion</button>";
			}
			else{
				div2.innerHTML="Test is Finished";
			}
			QCount++;
		}


		function NQuizKR()
		{
			document.getElementById("testgrade").style.display = "none";
			document.getElementById("nextQuestion").style.display = "none";
			QCount = 0;
			score=0;
			QuizKR();
		}

		function QuizKR()
		{
			var x = document.getElementById("bigTable");
			var quizT  =document.getElementById("quizTable");
				let A = document.getElementById("removeA");
				let E = document.getElementById("removeE");
				let I = document.getElementById("removeI");
				let O = document.getElementById("removeO");
				let U = document.getElementById("removeU");

			let Nromaji=romaji.slice(0);
			let Nimages=images.slice(0);
			//console.log(Nromaji);
			//console.log(Nimages);

			for(var i =0; i< Nromaji.length;i++)
			{
				if(A.checked==true && Nromaji[i].includes('a'))
				{
					Nromaji.splice(i,1);
					Nimages.splice(i,1);i=0;
				}
				if(E.checked==true && Nromaji[i].includes('e'))
				{
					Nromaji.splice(i,1);
					Nimages.splice(i,1);i=0;
				}
				if(I.checked==true && Nromaji[i].includes('i'))
				{
					Nromaji.splice(i,1);
					Nimages.splice(i,1);i=0;
				}
				if(O.checked==true && Nromaji[i].includes('o'))
				{
					Nromaji.splice(i,1);
					Nimages.splice(i,1);i=0;
				}
				if(U.checked==true && Nromaji[i].includes('u'))
				{
					Nromaji.splice(i,1);
					Nimages.splice(i,1);i=0;
				}
			}if(Nromaji.length<12)
			{
				quizT.rows[0].cells[1].innerHTML="remove less elements";
				return;
			}
			//console.log(Nromaji);
			x.style.display = "none";
				var key = Math.floor((Math.random()*Nromaji.length));

				var Question = Nimages[key];
				var r1; var r2; var r3; var r4

				for(var i=0; i<4; i++)
				{//select answer in image1, 3 other randoms
					r1= Nromaji[key];
					do
					{
						r2= Nromaji[Math.floor((Math.random()*Nromaji.length))];
					}while(r2==r1)
					do
					{
						r3= Nromaji[Math.floor((Math.random()*Nromaji.length))];
					}while(r3==r2 ||r3==r1)
					do
					{
						r4= Nromaji[Math.floor((Math.random()*Nromaji.length))];
					}while(r4==r3||r4==r2 ||r4==r1)
				}
				document.getElementById("instructions").innerHTML="<br>click on the Romaji that matches the kana element!";
			var answers = [r1, r2, r3, r4];
			//shuffle images
			var swap = Math.floor((Math.random() * 4));
			var holder = answers[swap];
			answers[swap] = answers[0];
			answers[0] = holder;
			var table = document.getElementById("quizTable");
			table.rows[0].cells[0].innerHTML ="<img src='"+Question+"' class = 'quizImage'>";
			for(var i = 0; i<table.rows.length; i++)
    		{
    			let row = table.rows[i];
    			row.cells[1].innerHTML=answers[i];
    			row.cells[1].className="qz";
    			if(i===swap)
    			{
    				table.rows[i].cells[1].onclick=function(){rightKR()};
    			} else{
    				row.cells[1].onclick=function(){wrongKR()};
    			}
    		}
    		//console.log(answers[swap]);
    	}
    		//right/wrong()--> display grade so far
    		// display button NEXT QUESTION

		function wrongKR()
		{
			var div1 = document.getElementById("testgrade");
			var div2 = document.getElementById("nextQuestion");

			document.getElementById("testgrade").style.display = "";
			document.getElementById("nextQuestion").style.display = "";
			if(QCount<10)
			{
				div1.innerHTML = "INCORRECT!  score is "+score*10 +"%";
				div2.innerHTML = 9-QCount +" Questions Left<button onclick='nextKR()'>nextQuestion</button>";
			}
			else{
				div2.innerHTML="Test is Finished";
			}
			QCount++;
		}
		function rightKR()
		{
			score++;
			var div1 = document.getElementById("testgrade");
			var div2 = document.getElementById("nextQuestion");

			document.getElementById("testgrade").style.display = "";
			document.getElementById("nextQuestion").style.display = "";
			if(QCount<10)
			{
				div1.innerHTML = "CORRECT!  score is "+score*10 +"%";
				div2.innerHTML = 9-QCount+" Questions Left<button onclick='nextKR()'>nextQuestion</button>";
			}
			else{
				div2.innerHTML="Test is Finished";
			}
			QCount++;
		}
		function ShowTable()
		{
			  var x = document.getElementById("bigTable");
			  if (x.style.display === "none") {
			    x.style.display = "";
			  } else {
			    x.style.display = "none";
				}
		}
		function nextKR()
		{
		if(QCount<1&&QCount>=10)
		{
			score=0;
			QCount=0;
			document.getElementById("testgrade").style.border="3px";

		}
			QuizKR()
		}
	</script>


	<?php

	
	?>
	<style>
		.HirIMAGE {
		  width: 150px;
		  height: 80px;
		  border: 1px solid black;
		  box-shadow: 0 3px 2px rgba(0,50,0,50);
		}

		.quizImage {
		  width: 40px;
		  height: 40px;
		  border: 1px solid black;
		}

		#quizTable {
  			border-collapse: separate;
  			border-spacing: 15px;
		}

		.qz {
			border: 1px solid black;
		}
	</style>

	<body>
		<div id="instructions">
		</div>
		<table id="quizTable">
			<tr>
				<td></td><td></td>
			</tr>
			<tr>
				<td></td><td></td>
			</tr>
			<tr>
				<td></td><td></td>
			</tr>
			<tr>
				<td></td><td></td>
			</tr>			
		</table>

		<div id="testgrade"></div>
		<div id="nextQuestion"></div>

		<button onclick="ShowTable()">Show/Hide Table</button>
		<div id="Hiraganas">
		<table id = "bigTable" style="width:100%">
			<tr><td></td>
				<td>-</td><td>a</td><td>e</td><td>i</td><td>o</td><td>u</td>
			<tr><td>-</td>
				<td></td>
				<td><img class ="HirIMAGE" src="../Hiraganas/staticImages/a.png" 
					onclick="play('Hiraganas/Sound/a.ogg')" 
					onmouseover="this.src='../Hiraganas/gifs/a.gif'" onmouseout="this.src='../Hiraganas/staticImages/a.png'"></td>
				<td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/e.png"
				 onclick="play('../Hiraganas/Sound/e.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/e.gif'" onmouseout="this.src='../Hiraganas/staticImages/e.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/i.png"
				 onclick="play('../Hiraganas/Sound/i.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/i.gif'" onmouseout="this.src='../Hiraganas/staticImages/i.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/o.png"
				 onclick="play('../Hiraganas/Sound/o.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/o.gif'" onmouseout="this.src='../Hiraganas/staticImages/o.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/u.png"
				 onclick="play('../Hiraganas/Sound/u.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/u.gif'" onmouseout="this.src='../Hiraganas/staticImages/u.png'"></td>
			</tr>
			<tr><td>h</td>
				<td></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ha.png"
				 onclick="play('../Hiraganas/Sound/ha.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ha.gif'" onmouseout="this.src='../Hiraganas/staticImages/ha.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/he.png"
				 onclick="play('../Hiraganas/Sound/he.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/he.gif'" onmouseout="this.src='../Hiraganas/staticImages/he.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/hi.png"
				 onclick="play('../Hiraganas/Sound/hi.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/hi.gif'" onmouseout="this.src='../Hiraganas/staticImages/hi.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ho.png"
				 onclick="play('../Hiraganas/Sound/ho.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ho.gif'" onmouseout="this.src='../Hiraganas/staticImages/ho.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/hu.png"
				 onclick="play('../Hiraganas/Sound/hu.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/hu.gif'" onmouseout="this.src='../Hiraganas/staticImages/hu.png'"></td>
			</tr>
			 <tr><td>k</td>
			 	<td></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ka.png"
				 onclick="play('../Hiraganas/Sound/ka.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ka.gif'" onmouseout="this.src='../Hiraganas/staticImages/ka.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ke.png"
				 onclick="play('../Hiraganas/Sound/ke.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ke.gif'" onmouseout="this.src='../Hiraganas/staticImages/ke.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ki.png"
				 onclick="play('../Hiraganas/Sound/ki.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ki.gif'" onmouseout="this.src='../Hiraganas/staticImages/ki.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ko.png"
				 onclick="play('../Hiraganas/Sound/ko.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ko.gif'" onmouseout="this.src='../Hiraganas/staticImages/ko.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ku.png"
				 onclick="play('../Hiraganas/Sound/ku.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ku.gif'" onmouseout="this.src='../Hiraganas/staticImages/ku.png'"></td>
			 </tr>
			 <tr><td>m</td>
			 	<td></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ma.png"
				 onclick="play('../Hiraganas/Sound/ma.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ma.gif'" onmouseout="this.src='../Hiraganas/staticImages/ma.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/me.png"
				 onclick="play('../Hiraganas/Sound/me.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/me.gif'" onmouseout="this.src='../Hiraganas/staticImages/me.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/mi.png"
				 onclick="play('../Hiraganas/Sound/mi.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/mi.gif'" onmouseout="this.src='../Hiraganas/staticImages/mi.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/mo.png"
				 onclick="play('../Hiraganas/Sound/mo.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/mo.gif'" onmouseout="this.src='../Hiraganas/staticImages/mo.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/mu.png"
				 onclick="play('../Hiraganas/Sound/mu.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/mu.gif'" onmouseout="this.src='../Hiraganas/staticImages/mu.png'"></td>
			 </tr>
			 <tr><td>n</td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/n.png"
				 onclick="play('../Hiraganas/Sound/n.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/n.gif'" onmouseout="this.src='../Hiraganas/staticImages/n.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/na.png"
				 onclick="play('../Hiraganas/Sound/na.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/na.gif'" onmouseout="this.src='../Hiraganas/staticImages/na.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ne.png"
				 onclick="play('../Hiraganas/Sound/ne.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ne.gif'" onmouseout="this.src='../Hiraganas/staticImages/ne.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ni.png"
				 onclick="play('../Hiraganas/Sound/ni.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ni.gif'" onmouseout="this.src='../Hiraganas/staticImages/ni.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/no.png"
				 onclick="play('../Hiraganas/Sound/no.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/no.gif'" onmouseout="this.src='../Hiraganas/staticImages/no.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/nu.png"
				 onclick="play('../Hiraganas/Sound/nu.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/nu.gif'" onmouseout="this.src='../Hiraganas/staticImages/nu.png'"></td>
			 </tr>
			 <tr><td>r</td>
			 	<td></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ra.png"
				 onclick="play('../Hiraganas/Sound/ra.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ra.gif'" onmouseout="this.src='../Hiraganas/staticImages/ra.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/re.png"
				 onclick="play('../Hiraganas/Sound/re.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/re.gif'" onmouseout="this.src='../Hiraganas/staticImages/re.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ri.png"
				 onclick="play('../Hiraganas/Sound/ri.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ri.gif'" onmouseout="this.src='../Hiraganas/staticImages/ri.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ro.png"
				 onclick="play('../Hiraganas/Sound/ro.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ro.gif'" onmouseout="this.src='../Hiraganas/staticImages/ro.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ru.png"
				 onclick="play('../Hiraganas/Sound/ru.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ru.gif'" onmouseout="this.src='../Hiraganas/staticImages/ru.png'"></td>
			 </tr>
			 <tr><td>s</td>
			 	<td></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/sa.png"
				 onclick="play('../Hiraganas/Sound/sa.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/sa.gif'" onmouseout="this.src='../Hiraganas/staticImages/sa.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/se.png"
				 onclick="play('../Hiraganas/Sound/se.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/se.gif'" onmouseout="this.src='../Hiraganas/staticImages/se.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/si.png"
				 onclick="play('../Hiraganas/Sound/si.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/si.gif'" onmouseout="this.src='../Hiraganas/staticImages/si.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/so.png"
				 onclick="play('../Hiraganas/Sound/so.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/so.gif'" onmouseout="this.src='../Hiraganas/staticImages/so.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/su.png"
				 onclick="play('../Hiraganas/Sound/su.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/su.gif'" onmouseout="this.src='../Hiraganas/staticImages/su.png'"></td>
			 </tr>
			 <tr><td>t</td>
			 	<td></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ta.png"
				 onclick="play('../Hiraganas/Sound/ta.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ta.gif'" onmouseout="this.src='../Hiraganas/staticImages/ta.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/te.png"
				 onclick="play('../Hiraganas/Sound/te.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/te.gif'" onmouseout="this.src='../Hiraganas/staticImages/te.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ti.png"
				 onclick="play('../Hiraganas/Sound/ti.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ti.gif'" onmouseout="this.src='../Hiraganas/staticImages/ti.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/to.png"
				 onclick="play('../Hiraganas/Sound/to.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/to.gif'" onmouseout="this.src='../Hiraganas/staticImages/to.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/tu.png"
				 onclick="play('../Hiraganas/Sound/tu.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/tu.gif'" onmouseout="this.src='../Hiraganas/staticImages/tu.png'"></td>
			 </tr>
			 <tr><td>w</td>
			 	<td></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/wa.png"
				 onclick="play('../Hiraganas/Sound/wa.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/wa.gif'" onmouseout="this.src='../Hiraganas/staticImages/wa.png'"></td>
				 <td></td>
				 <td></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/wo.png"
				 onclick="play('../Hiraganas/Sound/wo.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/wo.gif'" onmouseout="this.src='../Hiraganas/staticImages/wo.png'"></td>
				 <td></td>
			 </tr>
			 <tr><td>y</td>
			 	<td></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/ya.png"
				 onclick="play('../Hiraganas/Sound/ya.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/ya.gif'" onmouseout="this.src='../Hiraganas/staticImages/ya.png'"></td>
				 <td></td><td></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/yo.png"
				 onclick="play('../Hiraganas/Sound/yo.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/yo.gif'" onmouseout="this.src='../Hiraganas/staticImages/yo.png'"></td>
				 <td><img class ="HirIMAGE"  src="../Hiraganas/staticImages/yu.png"
				 onclick="play('../Hiraganas/Sound/yu.ogg')" 
				 onmouseover="this.src='../Hiraganas/gifs/yu.gif'" onmouseout="this.src='../Hiraganas/staticImages/yu.png'"></td>
			</tr>
		</table>
	</div>
	<div>
		Gifs are from https://commons.wikimedia.org/wiki/Category:Hiragana_stroke_order <br>
		Still images from https://commons.wikimedia.org/wiki/Hiragana?fbclid=IwAR2wobIax7o5W-eJkNrZjIQJwLtcUW1Y42XhVpIyOfRRFGuDHRn6XXVy3Lo
		<br>
		Sounds from http://www.guidetojapanese.org/audio/basic_sounds.zip
		<br>I would also like to thank codewithawa for help with the authentication<br>
		 https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database
	</div>
		</body>
		</html>