using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace MniamPL {
    public partial class Form1 : Form {
        PanelGlowny main;
        MySqlConnection connection = new MySqlConnection("Server=heltica.cba.pl;Port=3306;Database=heltica;Uid=helticadb;Pwd=Helticadb1;");
        MySqlCommand command;
        int i;
        public Form1() {
            InitializeComponent();
            passTextBox.PasswordChar = '•';
        }

        private void loginButton_Click(object sender, EventArgs e) {
            openConnection();
            string com = "SELECT OB.id_lokalu FROM m_uzytkownicy U, m_obslugalokalu OB WHERE U.login='" + loginTextBox.Text + "' AND U.haslo='" + passTextBox.Text + "' AND U.id_uzytkownika=OB.id_uzytkownika;";
            command = new MySqlCommand(com, connection);
            command.ExecuteNonQuery();
            MySqlDataAdapter ad = new MySqlDataAdapter(command);
            DataTable dt = new DataTable();
            ad.Fill(dt);
            i = Convert.ToInt32(dt.Rows.Count.ToString());
            if (i == 1) {
                main = new PanelGlowny(this, loginTextBox.Text, int.Parse(dt.Rows[0][0].ToString()));
                main.Show();
                this.Hide();
            } else {
                MessageBox.Show("Błędne dane logowania");
            }
            closeConnection();
            loginTextBox.Clear();
            passTextBox.Clear();
        }

        public void openConnection() {
            if (connection.State == ConnectionState.Closed) {
                connection.Open();
            }
        }

        public void closeConnection() {
            if (connection.State == ConnectionState.Open) {
                connection.Close();
            }
        }
    }
}
