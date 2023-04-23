# wordpress_shortcode_auswahl_thesen

### <b>Luther Project: Argentur MediaX<b><br>
Contains:
1. Shortcode: Auswahl der Thesen<br>
2. 'cred_save_data' Hook 1: Perferms some custom action after the Form (inside the Shortcode) is submitted<br>
3. 'cred_save_data' Hook 2: Perferms some custom action after the Form (on the bottom of the page) is submitted<br><br>

Requires the Toolset Plugin and the Combine Query Plugin (https://github.com/birgire/wp-combine-queries) to be activated.<br><br>
Example Shortcode: [luther-thesen-auswahl print="no" id_probant="[wpv-search-term param='probant-id']" loesungszahl="8, 9, 10" entwicklungszahl="18, 19, 28, 36, 44"]

Shortcode Default Parameter: <br>

'id_probant' => '124',<br>
'loesungszahl' => [1,2],<br>
'entwicklungszahl' => [1,2],<br>
'beziehungszahl' => [1,2],<br>
'schluesselzahl' => [1,2],<br>
'geistigezahl' => [1,2],<br>
'psychezahl' => [1,2],<br>
'koerperzahl' => [1,2],<br>
'materiezahl' => [1,2],<br>
'zusatzzahl' => [1,2],<br>
'print' => 'no'
