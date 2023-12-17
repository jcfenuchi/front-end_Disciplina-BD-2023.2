import hashlib
import datetime
import binascii
import mysql.connector

def pbkdf2_sha256_decimal(senha, salt, iteracoes, tamanho_saida):
    senha_derivada = hashlib.pbkdf2_hmac('sha256', senha.encode('utf-8'), salt, iteracoes, tamanho_saida)
    senha_decimal = int(binascii.hexlify(senha_derivada).decode('utf-8'), 16) % (10 ** tamanho_saida)
    return senha_decimal

def gerar_senha(usuario, mes_atual, semestre):
    # Calcula o mês anterior
    mes_anterior = (mes_atual - 1) % 12 + 1

    # Converte o usuário e os meses em strings
    usuario_str = str(usuario)
    mes_atual_str = str(mes_atual).zfill(2)
    mes_anterior_str = str(mes_anterior).zfill(2)
    semestre_str = str(semestre)
    # Calcula os hashes
    hash_usuario = hashlib.sha256(usuario_str.encode()).hexdigest()
    hash_mes_anterior = hashlib.sha256(mes_anterior_str.encode()).hexdigest()
    hash_mes_atual = hashlib.sha256(mes_atual_str.encode()).hexdigest()
    hash_semestre = hashlib.sha256(semestre_str.encode()).hexdigest()

    # Combina os hashes e calcula o hash final
    join_hash01 = hashlib.sha256((hash_usuario + hash_mes_anterior).encode()).hexdigest()
    senha_hash = hashlib.sha256((join_hash01 + hash_mes_atual + hash_semestre).encode()).hexdigest()

    # Converte o hash final de hexadecimal para decimal
    return f"{pbkdf2_sha256_decimal(senha_hash, b'Tokyo', 100_000, 6):06}"

mydb = mysql.connector.connect(
  host="localhost",
  user="jcfenuchi",
  password="asdQWE123!@#",
  database="mydb"
)
mycursor = mydb.cursor()
mes_atual = datetime.datetime.now().month
semestre = "2022.3" # LEMBRAR DE ALTERAR O SEMESTRE!
for i in range(0,101):
    senha = gerar_senha(f"container{i:03}", mes_atual, semestre)
    sql_alter = f"UPDATE Usuarios SET senha = '{senha}' WHERE login = 'container{i:03}'"
    mycursor.execute(sql_alter)
mydb.commit()