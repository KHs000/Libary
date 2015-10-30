

package library.view;

import javax.swing.JFrame;

/**
 *
 * @author Felipe Rabelo
 */
public class LibaryView {

    public static void main(String[] args) {
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }                
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Home_Screen_Adm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Home_Screen_Adm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Home_Screen_Adm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Home_Screen_Adm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } 
        //Este código acima seta o Look and Feel das telas para Nimbus
        
        Home_Screen_Adm window = new Home_Screen_Adm ();
        
        window.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        window.setVisible(true);
    }
    
}
