import java.util.regex.Pattern;

public class Usuario {
	
	private String nombre;
	private int edad;
	private String DNI;

	//Constructor
	public Usuario() {
		this.nombre = "";
		this.edad = 0;
		this.DNI = "";
	}
	
	public Usuario(String nombre, int edad, String DNI) {
		this.nombre = nombre;
		this.edad = edad;
		this.DNI = DNI;
	}

	
	//Getters y Setters
	public String getNombre() {
				
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public int getEdad() {
		return edad;
	}

	public void setEdad(int edad) {
		this.edad = edad;
	}

	public String getDNI() {
		return DNI;
	}

	

	
	public boolean setDNI(String DNI) {
		
		String error = "DNI introducido incorrecto";
		
		//formateamos el DNI para pasar a mayuscula la letra
		String formatoDNI = DNI.toUpperCase();
		
		//http://chuwiki.chuidiang.org/index.php?title=Expresiones_Regulares_en_Java
		
		String dniRegexp = "\\d{8}-?[A-Z]{1}";
		
		//creamos una variable que evalua si el dni introducido tiene el formato indicado en el pattern
		boolean correcto = Pattern.matches(dniRegexp, formatoDNI);
		
		if(correcto==false) {
			System.out.println(error);
			return false;
		}else {
			this.DNI = DNI;
			return true;
		}
	}

    @Override
    public String toString(){
        return "Nombre: "   + this.nombre +
                "\nEdad: "  + this.edad +
                "\nDNI: "   + this.DNI;
    }
}
