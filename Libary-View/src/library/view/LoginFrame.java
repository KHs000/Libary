/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package library.view;

import javax.swing.*;
import java.sql.*;
import java.awt.BorderLayout;
import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.DriverManager;

public class LoginFrame extends JFrame {
    
    //Cria botões e painéis
    
    private final JButton botaoentrar = new JButton("Entrar");
    private final JLabel labellogin = new JLabel("Login");
    private final JLabel labelsenha = new JLabel("Senha");
    private final JPanel panellogin = new JPanel();
    private final JPanel panelsenha = new JPanel();
    private final JPanel panelbotao = new JPanel();
    private final JTextField fieldlogin = new JTextField(15);
    private final JPasswordField fieldsenha = new JPasswordField(12);
    private final ButtonHandler handler = new ButtonHandler();

    public LoginFrame() {
        
        //Inicializa Frame
        super("Tela de Login");
        setLayout(new BorderLayout());
        panellogin.setLayout(new FlowLayout());
        panellogin.add(labellogin);
        panellogin.add(fieldlogin);
        panelbotao.add(botaoentrar);
        panelsenha.setLayout(new FlowLayout());
        panelsenha.add(labelsenha);
        panelsenha.add(fieldsenha);
        add(panellogin, BorderLayout.NORTH);
        add(panelsenha, BorderLayout.CENTER);
        add(panelbotao, BorderLayout.SOUTH);
        botaoentrar.addActionListener(handler);
    }

    public class ButtonHandler implements ActionListener {

        public ButtonHandler() {

        }

        @Override
        public void actionPerformed(ActionEvent evento) {
            if (evento.getSource() == botaoentrar) {
                //Informações sobre a conexão
                String url = "jdbc:mysql://localhost:3307/"; //URL do host
                String nomeBD = "test"; //Nome do db a ser usado
                String driver = "com.mysql.jdbc.Driver";
                String username = "root";
                String password = "password";
                
                try {
                    Class.forName(driver).newInstance();
                    Connection conexao = DriverManager.getConnection(url+nomeBD,username,password);
                    
                    Statement st = conexao.createStatement();
                    ResultSet result = st.executeQuery("SELECT * FROM administradores WHERE login = '" + fieldlogin.getText()
                            + "' AND senha = '" + fieldsenha.getText() + "'"
                    ); // executa query para checar se existe um administrdor com o mesmo login e senha
                    
                    if (!result.next()) {
                        JOptionPane.showMessageDialog(null, "Credenciais inválidas.");
                    }
                    else {
                        // Acesso permitido
                        JOptionPane.showMessageDialog(null, "Logado");
                        Home_Screen_Adm adm = new Home_Screen_Adm();
                    }
                    
                    conexao.close();
                } catch (ClassNotFoundException | InstantiationException | IllegalAccessException | SQLException ex) {
                    JOptionPane.showMessageDialog(null, "Erro");
                    ex.printStackTrace();
                }
            }
        }

    }

}
