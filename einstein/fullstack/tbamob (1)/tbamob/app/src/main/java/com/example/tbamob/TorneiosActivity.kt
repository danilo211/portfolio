package com.example.tbamob

import android.content.Intent
import android.net.Uri
import android.os.Bundle
import android.view.ViewGroup
import android.widget.*
import androidx.appcompat.app.AppCompatActivity

class TorneiosActivity : AppCompatActivity() {

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
            text = "Torneio Einstein 3"
            textSize = 24f
            setPadding(0, 0, 0, 8)
            setTextColor(0xFFFFFFFF.toInt()) 
        }

        val description = TextView(this).apply {
            text = "Participe do Torneio Einstein 3 e mostre seu talento!"
            setPadding(0, 0, 0, 16)
            setTextColor(0xFFFFFFFF.toInt()) 
        }

        val btnInfo = Button(this).apply {
            text = "Mais informações"
            setTextColor(0xFF121212.toInt()) 
            setBackgroundColor(0xFFBB86FC.toInt()) 
            setOnClickListener {
                val intent = Intent(Intent.ACTION_VIEW).apply {
                    data = Uri.parse("https://wa.me/5519983358336")
                }
                startActivity(intent)
            }
        }

        val btnRegister = Button(this).apply {
            text = "Registrar-se"
            setTextColor(0xFF121212.toInt()) 
            setBackgroundColor(0xFFBB86FC.toInt()) 
            setOnClickListener {
                //val intent = Intent(this@TorneiosActivity, RegistroActivity::class.java)
                startActivity(intent)
            }
        }

        layout.addView(title)
        layout.addView(description)
        layout.addView(btnInfo)
        layout.addView(btnRegister)

        setContentView(layout)
    }
}
