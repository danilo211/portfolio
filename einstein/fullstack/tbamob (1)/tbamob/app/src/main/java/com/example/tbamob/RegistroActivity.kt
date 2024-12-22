package com.example.tbamob

import android.os.Bundle
import android.view.View
import android.view.ViewGroup
import android.widget.*
import androidx.appcompat.app.AppCompatActivity
import okhttp3.*
import java.io.IOException
import java.net.InetAddress
import java.net.NetworkInterface

class RegistroActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

        val layout = LinearLayout(this).apply {
            orientation = LinearLayout.VERTICAL
            layoutParams = ViewGroup.LayoutParams(
                ViewGroup.LayoutParams.MATCH_PARENT,
                ViewGroup.LayoutParams.MATCH_PARENT
            )
            setPadding(16, 16, 16, 16)
            setBackgroundColor(0xFF121212.toInt())
        }

        val title = TextView(this).apply {
            text = "Registrar Time"
            textSize = 24f
            setPadding(0, 0, 0, 16)
            setTextColor(0xFFFFFFFF.toInt())
        }

        val teamNameInput = EditText(this).apply {
            hint = "Nome do Time"
            setHintTextColor(0xFF888888.toInt())
            setTextColor(0xFFFFFFFF.toInt())
            setBackgroundColor(0xFF333333.toInt())
        }

        val positions = listOf("Toplane", "Jungle", "Midlane", "ADC", "Suporte")
        val eloOptions = arrayOf(
            "Unranked", "Ferro", "Bronze", "Prata", "Ouro",
            "Platina", "Esmeralda", "Diamante", "Mestre",
            "GrÃ£o-Mestre", "Desafiante"
        )

        val fields = mutableListOf<LinearLayout>()

        for (position in positions) {
            val positionLayout = LinearLayout(this).apply {
                orientation = LinearLayout.VERTICAL
                layoutParams = ViewGroup.LayoutParams(
                    ViewGroup.LayoutParams.MATCH_PARENT,
                    ViewGroup.LayoutParams.WRAP_CONTENT
                )
                setPadding(0, 16, 0, 16)
            }

            val positionInput = EditText(this).apply {
                hint = position
                setHintTextColor(0xFF888888.toInt())
                setTextColor(0xFFFFFFFF.toInt())
                setBackgroundColor(0xFF333333.toInt())
            }

            val eloSpinner = Spinner(this).apply {
                val adapter = object : ArrayAdapter<String>(
                    context, android.R.layout.simple_spinner_item, eloOptions
                ) {
                    override fun getView(
                        position: Int,
                        convertView: View?,
                        parent: ViewGroup
                    ): View {
                        val view = super.getView(position, convertView, parent) as TextView
                        view.setTextColor(0xFFFFFFFF.toInt())
                        return view
                    }

                    override fun getDropDownView(
                        position: Int,
                        convertView: View?,
                        parent: ViewGroup
                    ): View {
                        val view = super.getDropDownView(position, convertView, parent) as TextView
                        view.setTextColor(0xFFFFFFFF.toInt())
                        return view
                    }
                }
                this.adapter = adapter
                setBackgroundColor(0xFF333333.toInt())
            }

            val positionEloLayout = LinearLayout(this).apply {
                orientation = LinearLayout.HORIZONTAL
                addView(positionInput)
                addView(eloSpinner)
            }

            positionLayout.addView(positionEloLayout)
            fields.add(positionLayout)
        }

        val btnSubmit = Button(this).apply {
            text = "Registrar"
            setTextColor(0xFF121212.toInt())
            setBackgroundColor(0xFFBB86FC.toInt())
            setOnClickListener {
                val teamName = teamNameInput.text.toString()
                val positionsData = fields.map {
                    val positionInput = it.getChildAt(0) as LinearLayout
                    val positionText = (positionInput.getChildAt(0) as EditText).text.toString()
                    val eloText = (positionInput.getChildAt(1) as Spinner).selectedItem.toString()
                    Pair(positionText, eloText)
                }

                if (teamName.isNotEmpty() && positionsData.all { it.first.isNotEmpty() }) {
                    enviarRegistro(teamName, positionsData)
                } else {
                    Toast.makeText(
                        this@RegistroActivity,
                        "Preencha todos os campos",
                        Toast.LENGTH_SHORT
                    ).show()
                }
            }
        }

        layout.addView(title)
        layout.addView(teamNameInput)
        fields.forEach { layout.addView(it) }
        layout.addView(btnSubmit)

        setContentView(layout)
    }

    private fun enviarRegistro(nomeTime: String, positionsData: List<Pair<String, String>>) {
        val client = OkHttpClient()

        val localIP = getLocalIPAddress()

        val formBody = FormBody.Builder()
            .add("team_name", nomeTime)
            .add("toplane", positionsData[0].first)
            .add("elo_toplane", positionsData[0].second)
            .add("jungle", positionsData[1].first)
            .add("elo_jungle", positionsData[1].second)
            .add("midlane", positionsData[2].first)
            .add("elo_midlane", positionsData[2].second)
            .add("adc", positionsData[3].first)
            .add("elo_adc", positionsData[3].second)
            .add("suporte", positionsData[4].first)
            .add("elo_suporte", positionsData[4].second)
            .build()

        val request = Request.Builder()
            .url("http://$localIP/register.php")
            .post(formBody)
            .build()

        client.newCall(request).enqueue(object : Callback {
            override fun onFailure(call: Call, e: IOException) {
                runOnUiThread {
                    Toast.makeText(this@RegistroActivity, "Erro ao registrar", Toast.LENGTH_SHORT)
                        .show()
                }
            }

            override fun onResponse(call: Call, response: Response) {
                runOnUiThread {
                    if (response.isSuccessful) {
                        Toast.makeText(
                            this@RegistroActivity,
                            "Registro feito com sucesso!",
                            Toast.LENGTH_SHORT
                        ).show()
                    } else {
                        Toast.makeText(
                            this@RegistroActivity,
                            "Erro no servidor",
                            Toast.LENGTH_SHORT
                        ).show()
                    }
                }
            }
        })
    }

    private fun getLocalIPAddress(): String? {
        try {
            val interfaces = NetworkInterface.getNetworkInterfaces().toList()
            for (intf in interfaces) {
                val addrs = intf.inetAddresses.toList()
                for (addr in addrs) {
                    if (!addr.isLoopbackAddress && addr is InetAddress) {
                        return addr.hostAddress
                    }
                }
            }
        } catch (e: Exception) {
            e.printStackTrace()
        }
        return null
    }
}