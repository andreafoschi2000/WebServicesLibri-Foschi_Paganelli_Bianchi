   M S B A M L   `   `   `  ����E  ASOAPClient, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null'clr-namespace:SOAPClient
SOAPClient  5   	       SOAPClient.MainWindow   5   	   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   *localclr-namespace:SOAPClient     5   	     � Title$  
MainWindow��5   	   $��275.717��6   $	��800��6-   .��5	      � $	��238��6   $	��Top=�6   .+�5
   
   �� -   5         ��Name$ 
btn_query1��5
      $��
Visualizza��6%   $
��Left=�6:   $��	10,56,0,0q�6U   $	��Top=�6h   $��75��6�   6�   �� 5   
   $8��2Numero libri "Ultimi Arrivi" del reparto "Fumetti:��6   $
��Left=�6\   $��	10,19,0,0q�6w   $	��Top=�6�   $��32��6�   $	��279��6�   �� 5   
   $^��XElenco dei libri scontati di ogni reparto ordinati 
dal meno scontato al più scontato:��6   $
��Left=�6z   $��
10,120,0,0q�6�   $	��Top=�6�   $��42��6�   $	��279��6�   �� 5   
   -   5        $ 
btn_query2��5      $��
Visualizza��6%   $
��Left=�6:   $��
10,179,0,0q�6U   $	��Top=�6i   $��75��6�   6�   �� 5   
   $��Elenco libri archiviati:��6   $
��Left=�63   $��
367,19,0,0q�6N   $	��Top=�6b   $��32��6z   $	��121��6�   �� 5   
   $��al��6   $
��Left=�6   $��
550,64,0,0q�68   $	��Top=�6L   $��32��6d   $��26��6p    J� RenderTransformOrigin$ -0.547,0.492&�6{   �� 5   
   $	��Dal��6   $
��Left=�6   $��
367,64,0,0q�69   $	��Top=�6M   $��32��6e   $��33��6q   �� 5   
   -   5        $ 
btn_query3��5      $��
Visualizza��6%   $
��Left=�6:   $��367,101,0,0q�6U   $	��Top=�6j   $��75��6�   6�   �� 5   
   $��Inserisci codice carrello��6   $
��Left=�64   $��367,144,0,0q�6O   $	��Top=�6d   $��30��6|   $	��137��6�   �� 5   
   $Z��TElenco titoli libri acquistati con numero copie
e nome utente associato al carrello��6   $
��Left=�6w   $��367,181,0,0q�6�   $	��Top=�6�   $��51��6�   $	��286��6�   �� 5   
   -   5        $ 
btn_query4��5      $��
Visualizza��6%   $
��Left=�6:   $��668,193,0,0q�6U   $	��Top=�6j   $��75��6�   6�   �� 5   
   -   5         ��Name$ 	txt_start��5      $
��Left=�6%   $��23��6@   $��
405,68,0,0q�6L    �� TextWrapping$
 Wrap=�6`   $	��Top=�6t   $	��127��6�   $ 0.5,0.5&�6�   .��6�   z�5      V� 5      .~�5      �� �� 5      �� 5       �� Angle$ -0.079Q�6&   T� 5      5      .��5   '   5      �� 5   
   -   5        $ txt_end��5      $
��Left=�6#   $��23��6>   $��
576,68,0,0q�6J   $
 Wrap=�6^   $	��Top=�6r   $	��145��6�   �� 5    
   -   5         ��Name$ label��5       $��Formato: gg/mm/aaaa��6   $
��Left=�6=   $��
576,19,0,0q�6X   $	��Top=�6l   $	��145��6�   �� 5!   
   -   5        $ 
txt_codice��5!      $
��Left=�6&   $��23��6A   $��521,148,0,0q�6M   $
 Wrap=�6b   $	��Top=�6v   $	��120��6�   5"      5#      