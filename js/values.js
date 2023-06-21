function addUsuario()
        {
			var idForma = document.getElementById('insertaUsuario');
			if(verifyValues(idForma)==false)
			{
				return false;//die();
			}
            var xhr = new XMLHttpRequest();
            var myObj;
			var arreglo={};
			for(var i = 0;i<idForma.length;i++)
			{
				arreglo[idForma.elements[i].name]=idForma.elements[i].value;
			}
            var datos=JSON.stringify(arreglo);
			xhr.open('POST','funcAsesor.php',true);
			xhr.send(datos);

            xhr.onreadystatechange = function()
            {
                if(xhr.readyState == 4 && xhr.status == 200) 
                {
                    alert("Asesor añadio correctamente");
					window.location="addUsuario.php";
                }
            };
        }
		
		function llenaPeriodos()
		{
			var xhr = new XMLHttpRequest();
			var txt = "";
			var d = "";
            var myObj;
			var periodo = document.getElementById('periodo');
			var datosP = new Array();
			var temp = new Array();

			xhr.open('POST',"funcPeriodo.php",true);
			xhr.send();
			
			xhr.onreadystatechange = function()
			{
                if(this.readyState == 4 && this.status == 200)
				{ 
					txt += this.responseText;
					myObj = JSON.parse(this.responseText);
					for(var i = 0;i<myObj.length;i++)
					{
						temp[0] = myObj[i].idPeriodo;
						temp[1] = myObj[i].fechaInicio;
						temp[2] = myObj[i].fechaFin;
						datosP[i] = new Array(temp[0],temp[1],temp[2]);
                    }
					//Lista de Periodos
					for(var j=datosP.length-1;j>=0;j--)
					{
						var d = datosP[j][0]+" - "+datosP[j][1]+" , "+datosP[j][2];
						var op = document.createElement('option');
						op.innerHTML = d;
						op.value = datosP[j][0];
						periodo.appendChild(op);
					}
				}
			};
			
        }
        
        function llenaAsesores()
		{
			var xhr = new XMLHttpRequest();
			var txt = "";
			var d = "";
            var myObj;
			var asesor = document.getElementById('nombreAsesor');
			var datosA = new Array();
			var temp = new Array();

			xhr.open('POST',"recAsesor.php",true);
            xhr.send();

			xhr.onreadystatechange = function()
			{
                if(this.readyState == 4 && this.status == 200)
				{ 
					txt += this.responseText;
					myObj = JSON.parse(this.responseText);
					for(var i = 0;i<myObj.length;i++)
					{
						temp[0] = myObj[i].matriculaAsesor;
						temp[1] = myObj[i].nombreAsesor;
						temp[2] = myObj[i].paternoAsesor;
						datosA[i] = new Array(temp[0],temp[1],temp[2]);
					}
					for(var j=0;j<datosA.length;j++)
					{
						var d = datosA[j][0]+" - "+datosA[j][1]+" "+datosA[j][2];
						var op = document.createElement('option');
						op.innerHTML = d;
						op.value = datosA[j][0];
						asesor.appendChild(op);
					}
				}
			};
	
		}
		
		function creaPeriodo()
		{
			var xhr = new XMLHttpRequest();
            var txt = "";
            var myObj;
			var inicio = document.getElementById('inicio').value;
			var fin = document.getElementById('fin').value;
			var nInicio = document.getElementById('inicio').name;
			var nFin = document.getElementById('fin').name;
			var datos = {};

			datos[nInicio]=inicio;
			datos[nFin]=fin;
			var json_string = JSON.stringify(datos);
			
			xhr.open('POST',"creaPeriodo.php",true);
			xhr.setRequestHeader("Content-type", "application/json");
            xhr.send(json_string);

			xhr.onreadystatechange = function()
			{
                if(this.readyState == 4 && this.status == 200)
				{
					alert("Periodo creado correctamente");
					window.location="horas.php";
				}
			};

		}

		function addHoras()
		{
			var xhr = new XMLHttpRequest();
            var txt = "";
            var myObj;
			var asesor = document.getElementById('nombreAsesor').value;
			var periodo = document.getElementById('periodo').value;
			var horas = document.getElementById('horas').value;
			var nAsesor = document.getElementById('nombreAsesor').name;
			var nPeriodo = document.getElementById('periodo').name;
			var nHoras = document.getElementById('horas').name;
			var datos = {};
			var arrayAsesor = asesor.split(",");
			var arrayPeriodo = periodo.split(",");
			datos[nAsesor]=arrayAsesor[0];
			datos[nPeriodo]=arrayPeriodo[0];
			datos[nHoras]=horas;
			var json_string = JSON.stringify(datos);
			
			xhr.open('POST',"addHoras.php",true);
			xhr.setRequestHeader("Content-type", "application/json");
            xhr.send(json_string);
			
			xhr.onreadystatechange = function()
			{
                if(this.readyState == 4 && this.status == 200)
				{
					alert("Horas añadidas correctamente");
					window.location="horas.php";
				}
			};
			
		}

function consultaHistorial()
{
	var xhr = new XMLHttpRequest();
	var txt = "";
	var total = 0;
	var myObj;
	var divTab = document.getElementById('divHistorial');
	while(divTab.firstChild){
		divTab.removeChild(divTab.firstChild);
	}
	var asesor = document.getElementById('nombreAsesor').value;

	var tabla = document.createElement('TABLE');
	var tableBody = document.createElement('TBODY');
    tabla.border='2';
	tabla.appendChild(tableBody);
	
	var heading = new Array();
    heading[0] = "Fecha de Inicio";
    heading[1] = "Fecha de Termino";
    heading[2] = "Horas";

	var datos = new Array();
    var temp = new Array();

	var data = {};
	var arrayAsesor = asesor.split(",");
	data['matriculaAsesor']=arrayAsesor[0];
	var json_string = JSON.stringify(data);
	console.log(json_string);
	xhr.open('POST',"consultaHistorial.php",true);
	xhr.setRequestHeader("Content-type", "application/json");
    xhr.send(json_string);

	xhr.onreadystatechange = function()
	{
        if(this.readyState == 4 && this.status == 200)
		{
			txt += this.responseText;
            myObj = JSON.parse(this.responseText);
			for(var i = 0;i<myObj.length;i++)
			{
            	temp[0] = myObj[i].fechaInicio;
            	temp[1] = myObj[i].fechaFin;
				temp[2] = myObj[i].horasAsesoria;
				datos[i] = new Array(temp[0],temp[1],temp[2]);
			}
			var tr = document.createElement('TR');
            tableBody.appendChild(tr);
			for(var j = 0;j<heading.length;j++)
			{
                var th = document.createElement('TH');
                th.appendChild(document.createTextNode(heading[j]));
                tr.appendChild(th);
            }
            //FILAS DE LA TABLA
			for (i = 0; i < datos.length; i++) 
			{
                var tr = document.createElement('TR');
				for (j = 0; j < datos[i].length; j++) 
				{
                    var td = document.createElement('TD')
                    td.appendChild(document.createTextNode(datos[i][j]));
                    tr.appendChild(td)
                }
				tableBody.appendChild(tr);
				total+=parseInt(datos[i][2]);
			}
			tableBody.appendChild(tr);
			var tr = document.createElement('TR');
			tableBody.appendChild(tr);
			var td = document.createElement('TD');
			tr.appendChild(td);
			var td = document.createElement('TD');
            td.appendChild(document.createTextNode("TOTAL:"));
			tr.appendChild(td);
			var td = document.createElement('TD');
            td.appendChild(document.createTextNode(total));
            tr.appendChild(td);
            divTab.appendChild(tabla)
		}
	};
}

function fillForm()
{
	var value = document.getElementById('nombreAsesor').value;
	var name = document.getElementById('nombreAsesor').name;
	var idForma = document.getElementById('modificaUsuario');
	var xhr = new XMLHttpRequest();
	var txt = "";
	var values = {};
	var datos = new Array();
	var temp = new Array();

	var arrayAsesor = value.split(",");
	values['matriculaAsesor']=arrayAsesor[0];
	var json_string = JSON.stringify(values);

	xhr.open('POST',"recData.php",true);
	xhr.setRequestHeader("Content-type", "application/json");
	xhr.send(json_string);
	
	xhr.onreadystatechange = function()
	{
		if(this.readyState == 4 && this.status == 200)
		{
			txt += this.responseText;
			myObj = JSON.parse(this.responseText);
			for(var i = 0;i<myObj.length;i++)
			{
            	datos[0] = myObj[i].matriculaAsesor;
            	datos[1] = myObj[i].nombreAsesor;
				datos[2] = myObj[i].paternoAsesor;
				datos[3] = myObj[i].maternoAsesor;
				datos[4] = myObj[i].telefonoAsesor;
				datos[5] = myObj[i].correoAsesor;
				datos[6] = myObj[i].carrera;
				datos[7] = myObj[i].division;
			}
			for (var i = 0;i<datos.length;i++)
			{
				if(datos[i]==null)
				{idForma.elements[i+1].value="";}
				else{
				idForma.elements[i+1].value=datos[i];
				}
			}
		}
	};
}

function modifUsuario()
        {
			var idForma = document.getElementById('modificaUsuario');
			/*if(verifyValues(idForma)==false)
			{
				die();
			}*/
            var xhr = new XMLHttpRequest();
            var myObj;
			var arreglo={};
			for(var i = 0;i<idForma.length;i++)
			{
				arreglo[idForma.elements[i].name]=idForma.elements[i].value;
			}
            var datos=JSON.stringify(arreglo);
			xhr.open('POST','modAsesor.php',true);
			xhr.send(datos);

            xhr.onreadystatechange = function()
            {
                if(xhr.readyState == 4 && xhr.status == 200) 
                {
                    alert("Asesor actualizado correctamente");
					window.location="modificaAsesor.php";
                }
            };
        }

function verifyValues(idForma)
{
	for(var i = 0;i<idForma.length;i++)
	{
		if(idForma.elements[i].value=="")
		{
			alert("Inserte el valor de "+idForma.elements[i].name);
			return false;
		}
		//arreglo[idForma.elements[i].name]=idForma.elements[i].value;
	}
}

function loadNavBar()
{
	var divNav = document.getElementById('navBar');
	var xhr = new XMLHttpRequest();
	var txt = "";
	xhr.open('GET','navBar.php',true);
	xhr.send();
	xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4 && xhr.status == 200) 
        {
			//txt += this.responseText;
			divNav.innerHTML = this.responseText/*(document.createTextNode(txt)this.responseText)*/;
            //alert(txt);
        }
    };
}

function loadFunc()
        {
            llenaPeriodos();
			llenaAsesores();
			loadNavBar();
		}

function deleteUsuario()
{
	var idForma = document.getElementById('modificaUsuario');
	/*if(verifyValues(idForma)==false)
	{
		die();
	}*/
    var xhr = new XMLHttpRequest();
    var myObj;
	var arreglo={};
	for(var i = 0;i<idForma.length;i++)
	{
		arreglo[idForma.elements[i].name]=idForma.elements[i].value;
	}
    var datos=JSON.stringify(arreglo);
	xhr.open('POST','deleteAsesor.php',true);
	xhr.send(datos);
    xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4 && xhr.status == 200) 
        {
            alert("Asesor eliminado correctamente");
			window.location="modificaAsesor.php";
        }
    };
}

function load2()
{
	llenaAsesores();
	loadNavBar();
}