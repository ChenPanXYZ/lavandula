#!/bin/sh
cd languages/zh_TW/LC_MESSAGES
msgfmt chenpan.po -o chenpan.mo
cd ../../zh_CN/LC_MESSAGES
msgfmt chenpan.po -o chenpan.mo
