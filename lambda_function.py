import subprocess
import os

def lambda_handler(event, context):
    # Execute o comando para chamar o arquivo PHP
    subprocess.run(['php', '-f', 'index.php'])

    # Mova o arquivo de saída para o diretório temporário da Lambda
    os.rename('output.pdf', '/tmp/output.pdf')

    # Retorne o caminho do arquivo PDF gerado
    return {
        'statusCode': 200,
        'body': '/tmp/output.pdf'
    }
