

package library.view;

import javax.swing.JFrame;

/**
 *
 * @author Felipe Rabelo
 */
public class LibaryView {

    public static void main(String[] args) {
        Cadastro_Aluno win1 = new Cadastro_Aluno ();win1.setVisible(true);
        win1.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        Cadastro_Livro win2 = new Cadastro_Livro ();win2.setVisible(true);
        win2.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        Cadastro_Master win3 = new Cadastro_Master ();win3.setVisible(true);
        win3.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        Lista_Livros win4 = new Lista_Livros ();win4.setVisible(true);
        win4.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
    }
    
}
