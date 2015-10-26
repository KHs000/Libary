

package library.view;

import javax.swing.JFrame;

/**
 *
 * @author Felipe Rabelo
 */
public class LibaryView {

    public static void main(String[] args) {
        Home_Screen_Adm window = new Home_Screen_Adm ();
        
        window.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        window.setVisible(true);
    }
    
}
