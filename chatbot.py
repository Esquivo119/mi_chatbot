from chatterbot import ChatBot
from chatterbot.trainers import ChatterBotCorpusTrainer

# Crear el bot
chatbot = ChatBot('PERUVIAM_Bot')

# Entrenarlo con corpus en español e inglés
trainer = ChatterBotCorpusTrainer(chatbot)
trainer.train('chatterbot.corpus.spanish', 'chatterbot.corpus.english')

# Chat en consola
print("🟢 Chatbot activo. Escribe 'salir' para terminar.")
while True:
    entrada = input("Tú: ")
    if entrada.lower() == 'salir':
        break
    respuesta = chatbot.get_response(entrada)
    print("Bot:", respuesta)
