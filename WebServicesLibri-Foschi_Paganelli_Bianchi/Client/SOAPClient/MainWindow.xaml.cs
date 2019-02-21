using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Net.Http;
using System.IO;

namespace SOAPClient
{
    /// <summary>
    /// Logica di interazione per MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
        }
         /*
        private void btnGET_Click(object sender, RoutedEventArgs e)
        {
            //GET
            // string url = "http://webservices.dotnethell.it/codicefiscale.asmx/CalcolaCodiceFiscale?Nome=" + txtNome.Text + "&Cognome=" + txtCognome.Text + "&ComuneNascita=" + txtComune.Text + "&DataNascita=" + txtData.Text + "&Sesso=" + txtSesso.Text;
            // MessageBox.Show(url);
            //string url = "http://api.openweathermap.org/data/2.5/weather?q=Cesena&mode=xml&units=metric&appid=fae6aadd9464ded0d7b508dc520533ba";
            string url = "http://localhost/rest/?name="+TxtLibro.Text;
            GetRequest(url);
           
            
        }
        */
        
        //posso usare using se è presete metodo dispose
        async static void GetRequest(string url)
        {
            using (HttpClient client = new HttpClient())
            {
                // Richiesta al server
                using (HttpResponseMessage response = await (client.GetAsync(url)))
                {
                    // Estrazione del contenuto
                    using (HttpContent content = response.Content)
                    {
                        string myContent = await (content.ReadAsStringAsync());

                        MessageBox.Show(myContent);
                    }
                }
            }
        }

        async static void PostRequest(string url, string nome, string cognome, string comune, string data, string sesso)
        {
           // MessageBox.Show(nome + " " + cognome + " " + comune + " " + data + " " + sesso);
            IEnumerable<KeyValuePair<string, string>> queries = new List<KeyValuePair<string, string>>()
            {
                new KeyValuePair<string, string> ("Nome",nome),
                new KeyValuePair<string, string> ("Cognome",cognome),
                new KeyValuePair<string, string> ("ComuneNascita",comune),
                new KeyValuePair<string, string> ("DataNascita",data),
                new KeyValuePair<string, string> ("Sesso",sesso)
            };
            HttpContent q = new FormUrlEncodedContent(queries);
    
            using (HttpClient client = new HttpClient())
            {
               // client.DefaultRequestHeaders.TryAddWithoutValidation("Content-Type", "application/x-www-form-urlencoded");
                using (HttpResponseMessage response = await client.PostAsync(url,q))
                { 
                    using (HttpContent content = response.Content)
                    {//possiamo usare HttpContentHeader headers = content.Headers;
                        
                        string mycontent = await content.ReadAsStringAsync();
                        MessageBox.Show(mycontent);
                    }

                }

            }
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            string url = @"http://10.13.100.27/Server/index.php/" + "?op=0";

            GetRequest(url);
        }
    }
}
