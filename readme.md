## JavaScript Obfuscation

A quick example showing how to obfuscate a JavaScript file, encode it to Base64, and embed it into an HTML template.

### 1. Create `plaintext.js`

```bash
# write a simple alert script
cat <<EOF > plaintext.js
function hello() {
    alert("Hello World!");
}
hello();
EOF
```

### 2. Obfuscate to `obfuscated.js`

```bash
# use online obfuscator
open "https://obfuscator.io"
```

### 3. Base64 encode to `obfuscated.base64`

```bash
# output Base64 string
php encoder.php > obfuscated.base64
```

### 4. Build `index.html`

```bash
# load Base64, strip newlines
encoded=$(tr -d '\n' < obfuscated.base64)

# escape '/' and '&' for sed
esc=$(printf '%s' "$encoded" | sed 's/[\/&]/\\&/g')

# replace placeholder in template
sed "s/BASE64_ENCODED/${esc}/g" index.tpl > index.html
```
