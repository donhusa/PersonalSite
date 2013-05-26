<!DOCTYPE html>
<html>

<?php $my_file=file_get_contents("header.html");
$to_print=str_replace("<!--js-->",
	'<script language="javascript" type="text/javascript" '.
		'src="javascript/courseeffects.js"></script>'
	,$my_file);
echo $to_print; 
include("header.php");
?>

<div id="main">
<h2> My Courses</h2><hr />
Click on a semester to display the courses I took, or click
<u><span id="allclasses">here</span></u> to show all).

<br /><br />
<div id="s8i" >
Spring 2013 Courses</div>
<div id="s8c" style="display:none"><hr />
&nbsp; &nbsp; ECE 556: Wireless Networking<br />
&nbsp; &nbsp; ECE 590: Advanced Topics in ECE - Image and Video Processing<br />
&nbsp; &nbsp; BIO 311: Intro to Systems Biology<br />
&nbsp; &nbsp; HOUSECS 59: House Course - Programming Languages<br />
&nbsp; &nbsp; PSYEDU 150: Social Dancing</div>
<br />

<div id="s7i" >
	Fall 2012 Courses</div>
<div id="s7c" style="display:none"><hr />
&nbsp; &nbsp; ECE 559: Advanced Digital System Design <br />
&nbsp; &nbsp; ECE 486: Wireless Communication Systems<br />
&nbsp; &nbsp; ECE 230: Microelectronic Devices & Circuits<br />
&nbsp; &nbsp; ECON 343: The Contemporary Art Market</div>
<br />

<div id="s6i" >
	Spring 2012 Courses</div>
<div id="s6c" style="display:none"><hr />
&nbsp; &nbsp; COMPSCI 110: Operating Systems <br />
&nbsp; &nbsp; COMPSCI 130: Design / Analysis of Algorithms<br />
&nbsp; &nbsp; COMPSCI 72: Artificial Life, Culture, and Evolution<br />
&nbsp; &nbsp; ECON 172: Intermediate Finance</div>
<br />

<div id="s5i">
	Fall 2011 Courses</div>
<div id="s5c" style="display:none"><hr />
&nbsp; &nbsp; COMPSCI 108: Software Design / Implementation <br />
&nbsp; &nbsp; ECE 53: Electromagnetic Fields<br />
&nbsp; &nbsp; ECE 156: Computer Network Architecture<br />
&nbsp; &nbsp; ECON 138: International Economy, 1850-2000</div>
<br />

<div id="s4i">
	Spring 2011 Courses</div>
<div id="s4c" style="display:none"><hr />
&nbsp; &nbsp; ECE 152: Computer Architecture <br />
&nbsp; &nbsp; ECE 54: Intro to Signals & Systems<br />
&nbsp; &nbsp; COMPSCI 102: Discrete Math for Computer Science<br />
&nbsp; &nbsp; ECON 55: Intermediate Microeconomics</div>
<br />

<div id="s3i">
	Fall 2010 Courses</div>
<div id="s3c" style="display:none"><hr />
&nbsp; &nbsp; ECE 52: Intro to Digital Systems <br />
&nbsp; &nbsp; COMPSCI 100E: Program Design / Analysis II<br />
&nbsp; &nbsp; MATH 108: Ordinary & Partial Differential Equations<br />
&nbsp; &nbsp; PHYSICS 62: Intro to Electricity, Magnetism, and Optics</div>
<br />

<div id="sSummeri">
	Summer 2010 Courses</div>
<div id="sSummerc" style="display:none"><hr />
&nbsp; &nbsp; Economics 102: Intro to Microeconomics (@Rutgers)<br />
&nbsp; &nbsp; Economics 103: Intro to Macroeconomics (@Rutgers)</div>
<br />

<div id="s2i">
	Spring 2010 Courses</div>
<div id="s2c" style="display:none"><hr />
&nbsp; &nbsp; ECE 27: Fundamentals of Electrical & Computer Engineering <br />
&nbsp; &nbsp; MATH 108: Linear Algebra & Differential Equations<br />
&nbsp; &nbsp; STA 113: Probability & Statistics in Engineering<br />
&nbsp; &nbsp; DANCE 101: Intro to Dance</div>
<br />

<div id="s1i">
	Fall 2009 Courses</div>
<div id="s1c" style="display:none"><hr />
&nbsp; &nbsp; EGR 53: Computational Methods in Engineering <br />
&nbsp; &nbsp; MATH 103: Intermediate Calculus<br />
&nbsp; &nbsp; CHEM 31: Core Concepts in Chemistry<br />
&nbsp; &nbsp; WRITING 20: Academic Writing</div>
<br />

</body>
</html>