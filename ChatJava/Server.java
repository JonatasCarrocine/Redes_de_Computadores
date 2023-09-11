import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.Scanner;

public class Server {
    public static void main (String[] args) throws IOException{
        Socket socket = null;
        InputStreamReader entradaConexao = null;
        OutputStreamWriter saidaConexao = null;
        BufferedReader leituraDados = null;
        BufferedWriter escritaDados = null;
        ServerSocket serverSocket = new ServerSocket(7070); //servidor cria um serversocket na porta 7070

        /*Aguarda conexoes de clientes*/
        while(true){
            try{
                Scanner msgInput = new Scanner(System.in);

                socket = serverSocket.accept(); //aceita conexao com o cliente

                entradaConexao = new InputStreamReader(socket.getInputStream()); //configura entrada da conexao
                saidaConexao = new OutputStreamWriter(socket.getOutputStream()); //configura saida da conexao
                leituraDados = new BufferedReader(entradaConexao); 
                escritaDados = new BufferedWriter(saidaConexao);

                System.out.println("Cliente entrou!"); //imprime na tela servidor que o cliente entrou

                while(true){
                    String msgFromClient = leituraDados.readLine(); //recebe a mensagem enviada pelo cliente

                    System.out.println("Cliente: "+msgFromClient); //Imprime a mensagem do cliente
                    //escritaDados.write("Mensagem recebida"); //Envia para o cliente que a mensagem foi recebida pelo servidor
                    escritaDados.newLine();
                    escritaDados.flush();

                    if(msgFromClient.equalsIgnoreCase("Tchau")){
                        System.out.println("Cliente encerrou a conexao!"); //imprime na tela servidor que o cliente saiu
                        break;
                    }

                    System.out.println("Escrever pro cliente: ");
                    String msgFromServer = msgInput.nextLine();
                    if(msgFromServer != null){
                        escritaDados.write(msgFromServer);
                        escritaDados.newLine();
                        escritaDados.flush();
                    }
                }

                //Fecha as conexoes
                socket.close();
                entradaConexao.close();
                saidaConexao.close();
                leituraDados.close();
                escritaDados.close();
            }
            catch (IOException e){
                e.printStackTrace();
            }
        }
    }
}
