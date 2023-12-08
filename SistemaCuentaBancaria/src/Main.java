
	import java.util.Scanner;
	import java.text.NumberFormat;
	import java.util.InputMismatchException;
	import java.util.Locale;
	
	public class Main {
		public static void main(String[] args) {
			
			//abrimos un objeto Scanner para leer por teclado
			Scanner sc = new Scanner(System.in);

			//Creamos un nuevo objeto de la clase Usuario
			Usuario nuevoUsuario = new Usuario();
			//Llamamos al metod pedirUsuario para introducir los datos
			pedirUsuario(nuevoUsuario);
			//Creamos un nuevo objeto de la clase  Cuenta
			Cuenta nuevaCuenta = new Cuenta(nuevoUsuario);
			
			//Variables auxiliares
			int opcion;
			double saldo;
			String auxDesc;
			double auxImp;
			
			//creamos un bucle do while con un switch en el interior del cual no sale hasta que la opcion sea 0
			do {
				muestraMenu();
				opcion = sc.nextInt();
				sc.nextLine();
				
				switch(opcion) {
				case 0:
					System.out.println("Fin del programa.");
					System.out.println("Gracias por utilizar la aplicación.");
	                break;
				
				case 1:
					introGasto(nuevaCuenta);
					break;
				
				case 2:
					introIngreso(nuevaCuenta);
					break;

				case 3:
					mostrarGastos(nuevaCuenta);
					break;
				
				case 4:
					mostrarIngresos(nuevaCuenta);
					break;
					
				case 5:
					System.out.println(nuevaCuenta.toString());
				
				default: // Con cualquier otro número, muestra un mensaje
	                System.out.println("Introduce el valor correcto");
	                break;
				}
			}while(opcion !=0);
			
			
			sc.close();
	
		}
		
		//Metodo para introducir un ingreso		
		private static void introIngreso(Cuenta cuenta) {
			Scanner sc = new Scanner(System.in);
			Locale spanish = new Locale("es", "ES");
			NumberFormat nf = NumberFormat.getInstance(spanish);
			double saldo;
			String auxDesc;
			double auxImp=0;
			boolean comprueba = false;
			
			System.out.println("Introduce la descripcion");
			auxDesc=sc.nextLine();
			//si no se introduce el importe en formato europeo no es valido
			do {
				System.out.println("Introduce el importe");
				try {
					auxImp=sc.nextDouble();
					comprueba = true;
				}catch (InputMismatchException e) {
					comprueba = false;
					sc.nextLine();
					System.out.println("Introduce el importe en formato europeo ###,##");
				}
			}while(!comprueba);
			sc.nextLine(); 
			
			saldo=cuenta.addIngresos(auxDesc, auxImp);
			auxDesc="";
			auxImp=0;
			System.out.println("Saldo restante: "+ nf.format(cuenta.getSaldo())+"€");
			
			
		}

		//Metodo para introducir un gasto
		private static void introGasto(Cuenta cuenta) {
			Scanner sc = new Scanner(System.in);
			Locale spanish = new Locale("es", "ES");
			NumberFormat nf = NumberFormat.getInstance(spanish);
			double saldo;
			String auxDesc;
			double auxImp=0;
			boolean comprueba = false;
			
			System.out.println("Introduce la descripcion");
			auxDesc=sc.nextLine();
			//si no se introduce el importe en formato europeo no es valido
			do {
				System.out.println("Introduce el importe");
				try {
					auxImp=sc.nextDouble();
					comprueba = true;
				}catch (InputMismatchException e) {
					comprueba = false;
					sc.nextLine();
					System.out.println("Introduce el importe en formato europeo ###,##");
				}
			}while(!comprueba);
			sc.nextLine(); 
			
			saldo=cuenta.addGastos(auxDesc, auxImp);
			auxDesc="";
			auxImp=0;
			//System.out.println("Saldo restante: "+ cuenta.getSaldo());
			System.out.println("Saldo restante: "+ nf.format(cuenta.getSaldo()) + "€");
			
		}
		
		//Metodo para pedir el usuario
		private static void pedirUsuario(Usuario usuario) {
			//Creamos objeto Scanner para leer entrada de teclado
			Scanner sc = new Scanner(System.in);
			
			
			
			//System.out.println("");
			
			System.out.println("Introduce el nombre del usuario");
			usuario.setNombre(sc.nextLine());
			//Solo son posibles numero mayores que 0
			//creamos una excepcion para que detecte si la edad no es un numero		
			do {
	            try { 
	                System.out.println("Introduce la edad del usuario");
	                usuario.setEdad(sc.nextInt());
	            } catch (InputMismatchException e) {
	                System.out.println("La edad debe ser un número mayor a 0");
	            }
	            sc.nextLine(); 
	        }while(usuario.getEdad() <= 0);
			
			//Creamos un bucle y solo sale cuando el formato del DNI sea correcto
			boolean comp = false;
				
			while(!comp) {
				System.out.println("Introduce el DNI del usuario");
				String DNI = sc.nextLine();
				comp = usuario.setDNI(DNI);
			}
			
			
			System.out.println("Usuario creado correctamente");
			
			
			
		}
		
		//Metodo para mostrar el menu
		private static void muestraMenu() {
			System.out.println("Realiza una nueva acción");
            System.out.println("1. Introduce un nuevo gasto");
            System.out.println("2. Introduce un nuevo ingreso");
            System.out.println("3. Mostrar gastos");
            System.out.println("4. Mostrar ingresos");
            System.out.println("5. Mostrar saldo");
            System.out.println("0. Salir");
		}
		
		//Metodo para mostrar los gastos
		private static void mostrarGastos(Cuenta cuenta) {
			if(cuenta.getGastos().size()==0) {
				System.out.println("No existen gastos en esta cuenta");
			}else {
			for(int x=0;x<cuenta.getGastos().size();x++) {
				System.out.println(cuenta.getGastos().get(x).toString());
			}
		}
		}
		
		//Metodo para mostrar los ingresos
		private static void mostrarIngresos(Cuenta cuenta) {
			for(int x=0;x<cuenta.getIngresos().size();x++) {
				System.out.println(cuenta.getIngresos().get(x).toString());
			}
		}
		
		
	}
	

