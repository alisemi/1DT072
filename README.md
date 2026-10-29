# 1DT072 Secure Computing Systems – Lab Materials

Simple scripts and files used in the labs for **1DT072 Secure Computing Systems** at Uppsala University.

> **Warning:** These materials are deliberately insecure and are meant for lab exercises only. Run them on your own machine or in a lab VM, never on a machine that is reachable from the internet.

## Contents

| File | Description |
| --- | --- |
| `install.sh` | Installs Docker and starts [OWASP Juice Shop](https://owasp.org/www-project-juice-shop/) on port 3000 (Debian/Ubuntu). |
| `fileeditor.php` | A small PHP web page for viewing and editing files under `/tmp/`. |
| `weedyseadragon` | Lab binary for Linux x86-64. |
| `weedyseadragon_aarch64` | The same lab binary for Linux ARM64 (aarch64). |
| `lab_materials.zip` | All of the above in a single archive. |

## Usage

### Juice Shop

```bash
chmod +x install.sh
./install.sh
```

Then open <http://localhost:3000> in a browser.

### File editor

With PHP installed, run this in the directory that holds `fileeditor.php`:

```bash
php -S localhost:3000
```

Then open <http://localhost:3000/fileeditor.php>.

### weedyseadragon

Use the binary that matches your machine's architecture (`uname -m`):

```bash
chmod +x weedyseadragon          # x86_64
./weedyseadragon

chmod +x weedyseadragon_aarch64  # aarch64 / arm64
./weedyseadragon_aarch64
```

Follow the lab instructions for what to do with it.
