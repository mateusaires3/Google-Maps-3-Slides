import java.util.Scanner;

public class Switchs {
	static int valor;
	
	public static void main(String[] args){
		System.out.println("Digite 1 ou 2 para testar: ");
		Scanner recebendo = new Scanner(System.in);
		valor = recebendo.nextInt();
		switch(valor){
		case 1: 
			System.out.println("Testado");
			break;
		case 2:
			System.out.println("Você e um tampo, por que me escolheu !");
			break;
		}
			
	}
}
