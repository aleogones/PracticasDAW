
public class Ingreso extends Dinero {

	public Ingreso(double ingreso, String description) {
		this.dinero=ingreso;
		this.description=description;
	}

	
	public double getDinero() {

		return this.dinero;
	}

	
	public void setDinero(double dinero) {
		this.dinero=dinero;
		
	}

	
	public String getDescription() {

		return this.description;
	}

	
	public void setDescription(String description) {
		this.description=description;
		
	}
	
    @Override
    public String toString() {
        return "Ingreso: " + this.description
                + ". Importe: " + this.dinero ;
    }

}
