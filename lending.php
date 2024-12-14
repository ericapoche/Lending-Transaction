?<!DOCTYPE html>
<html>
<html>
<center>
<body>
	<head><h3>LENDING TRANSACTION</h3></head>
	<h1><center>ABC Lending</center></h1>
	<table align="center" width="70%" border="1" bgcolor="#808080">
		<tr align="center" bgcolor="green" style="color: white; font-family: Arial; font-weight: bold;">
		<?php
		$borrowed = $_POST['borrowed'];
		$terms = $_POST['terms'];
		$month = $terms * 12;
		$principal = $borrowed / 12;
		if ($borrowed >= 1 and $borrowed <= 10000)
		{
			$inte = 0.02;
		}
		elseif ($borrowed >= 10001 and $borrowed <= 30000)
		{
			$inte = 0.03;
		}
		elseif ($borrowed >= 30001 and $borrowed <= 50000)
		{
			$inte = 0.05;
		}
		elseif ($borrowed >= 50001 and $borrowed <= 100000)
		{
			$inte = 0.07;
		}
		else
		{
			$inte = 0.08;
		}

		?>

		<?php echo "Borrowed Amount: " .$borrowed."<br>"?>
		<?php echo "Terms: " .$terms. "year(s)"?>
		<tr style="color: white; font-weight: bold;" align="center" bgcolor="green">
			<td>Months</td>
			<td>Outstanding Balance</td>
			<td>Principal</td>
			<td>Interest</td>
			<td>Monthly Amortization</td>
		</tr>
		
		<?php
		$totalinte = 0;
		$totalamortization = 0;

		for ($x = 1; $x <= $month; $x++)
		{
			$balance = $borrowed - $principal * $x + $principal;
			$principal = $borrowed / $month;
			$interest = $balance * $inte;
			$monthly = $principal + $interest;
			$totalinte += $interest;
			$totalamortization += $monthly;

			if ($x % 2 != 0)
			{
			echo "<tr align=right bgcolor=gray>";
			echo "<td align=center>$x</td>";
			echo "<td>".number_format($balance, 2)."</td>";
			echo "<td>".number_format($principal, 2)."</td>";
			echo "<td>".number_format($interest, 2)."</td>";
			echo "<td>".number_format($monthly, 2)."</td>";
			echo "</tr>";	
			}

			if ($x % 2 == 0)
			{
			echo "<tr align=right bgcolor=lightgray>";
			echo "<td align=center>$x</td>";
			echo "<td>".number_format($balance, 2)."</td>";
			echo "<td>".number_format($principal, 2)."</td>";
			echo "<td>".number_format($interest, 2)."</td>";
			echo "<td>".number_format($monthly, 2)."</td>";
			echo "</tr>";		

			
			}
		}
		echo "<tr align=right bgcolor=lightgray><td colspan=3> TOTAL <td>";	
		echo number_format($totalinte, 2);
		echo "<td>".number_format($totalamortization, 2)."</td> </tr>";
		

		?>
	</table>

	<table>
		<tr>
		<td width="100%"align="right">
			<br></br><a href="lending.html">Back to Loan Form
		</td>
	</tr>
	</table>
</body>
</center>
</html>
</html>