import java.util.Scanner;

public class HelloWorld {
	public static void main(String[] args) {
		int valor;
		System.out.println("Armazene um número");
		Scanner valor1 = new Scanner(System.in); 
		valor = valor1.nextInt();
		System.out.println("O valor digitado foi " + valor);
	}
}
