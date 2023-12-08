import java.text.NumberFormat;
import java.util.ArrayList;
import java.util.List;
import java.util.Locale;

public class Cuenta {
	
	private double saldo; //Saldo de la cuenta
	private Usuario usuario;
	private List<Gasto> gastos;// Lista de gastos
	private List<Ingreso> ingresos;//Lista de ingresos
	Locale spanish = new Locale("es", "ES");
	NumberFormat nf = NumberFormat.getInstance(spanish);
	
	//Constructor
	public Cuenta(Usuario usuario) {
		this.usuario=usuario;
		this.saldo=0;//Saldo inicial 0
		this.gastos = new ArrayList<Gasto>();
		this.ingresos  = new ArrayList<Ingreso>();
	}

	public double getSaldo() {
		return saldo;
	}

	public void setSaldo(double saldo) {
		this.saldo = saldo;
	}

	public Usuario getUsuario() {
		return usuario;
	}

	public void setUsuario(Usuario usuario) {
		this.usuario = usuario;
	}

	public List<Gasto> getGastos() {
		return gastos;
	}


	public List<Ingreso> getIngresos() {
		return ingresos;
	}


	
	double addIngresos (String description, double cantidad) {
		Ingreso nuevoIngreso = new Ingreso(cantidad, description);
		this.ingresos.add(nuevoIngreso);
		this.saldo = this.saldo + cantidad;
		return saldo;
	}
	
	double addGastos (String description, double cantidad) {
        try{ 
            
            
             
            if(this.getSaldo()<cantidad){ 
                throw new GastoException();
                
            }

        }catch(GastoException e){

           return saldo;
        }

        // Si no ejecuta el catch ejecutará lo siguiente
        // Creamos un nuevo gasto
        Gasto nuevoGasto=new Gasto(cantidad,description);
        // Lo agregamos a la lista de gastos
        this.gastos.add(nuevoGasto);
        this.saldo = this.saldo - cantidad;
        
        // Devolvemos el saldo
        return saldo;
		
	}
	
    @Override
    public String toString(){
        return this.usuario.getNombre() + ", el saldo de tu "
                + "cuenta es " + nf.format(this.saldo)+"€";
    }
}
