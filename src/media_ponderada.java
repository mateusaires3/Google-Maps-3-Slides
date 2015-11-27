import java.util.Scanner;  

public class media_ponderada {  
	static double nota,nota2,nota3,total;

	public static void main(String args[]){  
	
  		Scanner nota1 = new Scanner(System.in);  
		System.out.println("Digite a primeira nota? ");  
		nota = nota1.nextInt(); 
  		Scanner nota02 = new Scanner(System.in);  
		System.out.println("Digite a segunda nota? ");  
		nota2 = nota02.nextInt();  
  		Scanner nota03 = new Scanner(System.in);  
		System.out.println("Digite a terceira nota? ");  
		nota3 = nota03.nextInt();  
		
		total = (nota + nota2 + nota3) / 5;
		if (total > 60){
			System.out.println("Aluno Aprovado " + total);
		}
		else if (total >= 20) {
			System.out.println("Aluno Prova final "+ total);
		}
		else {
			System.out.println("Aluno Reprovado "+ total);
		}
		

	}  
} 