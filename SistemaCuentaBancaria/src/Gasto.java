
public class Gasto extends Dinero{

	
	public Gasto(double gasto, String description) {
		this.dinero=gasto;
		this.description=description;
	}
	

	public double getDinero() {
		// TODO Auto-generated method stub
		return 0;
	}

	public void setDinero(double dinero) {
		// TODO Auto-generated method stub
		
	}


	public String getDescription() {
		// TODO Auto-generated method stub
		return null;
	}


	public void setDescription(String description) {
		// TODO Auto-generated method stub
		
	}

    public String toString() {
        return "Gasto: " + this.description
                + ". Importe: " + this.dinero ;
    }

}
