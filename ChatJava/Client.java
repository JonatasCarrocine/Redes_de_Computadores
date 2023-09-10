import java.io.*;
import java.net.Socket;
import java.util.Scanner;

public class Client{
    public static void main (String[] args){
        //iniciacao das variaveis
        Socket socket = null;
        InputStreamReader entradaConexao = null;
        OutputStreamWriter saidaConexao = null;
        BufferedReader leituraDados = null;
        BufferedWriter escritaDados = null;

        try{
            socket = new Socket("localhost", 7070); //cria conexao em localhost na porta 7070

            entradaConexao = new InputStreamReader(socket.getInputStream()); //configura nova entrada da conexao
            saidaConexao = new OutputStreamWriter(socket.getOutputStream()); //configura nova saida da conexao
            leituraDados = new BufferedReader(entradaConexao); //configura nova leitura de dados
            escritaDados = new BufferedWriter(saidaConexao); //configura nova escrita de dados

            Scanner scanner = new Scanner(System.in);

            while(true){
                String msgToSend = scanner.nextLine(); //Ler linha
                escritaDados.write(msgToSend); //Escreve e envia pro servidor
                escritaDados.newLine();
                escritaDados.flush();
                
                System.out.println("Servidor: "+leituraDados.readLine()); //Imprime a mensagem do servidor, no qual ele enviou

                if (msgToSend.equalsIgnoreCase("Tchau")){ //Se tchau, encerra conexao
                    System.out.println("Conexao encerrada!");
                    break;
                }
            }
        }catch (IOException e){
            e.printStackTrace();
        }
    }
}
