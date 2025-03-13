<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Image Gallery with Lightbox</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 20px;
      padding: 0;
      box-sizing: border-box;
    }

    h1 {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
      background-color: aqua;
      color: #333;
      border-radius: 10px 10px 10px 10px;
    }

    .gallery {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 10px;
    }

    .gallery img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 8px;
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .gallery img:hover {
      transform: scale(1.05);
    }

    .lightbox {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 1000;
    }

    .lightbox img {
      max-width: 90%;
      max-height: 90%;
      border-radius: 8px;
    }

    .close-btn {
      position: absolute;
      top: 30px;
      right: 140px;
      font-size: 30px;
      color: white;
      cursor: pointer;
      background: none;
      border: none;
    }

    .close-btn:hover {
      color: #ff4d4d;
    }
  </style>
</head>
<body>

  <h1>Image Gallery with Lightbox</h1>
  
  <div id="gallery" class="gallery"></div>

  <div id="lightbox" class="lightbox">
    <img id="lightbox-img" />
    <button id="close-btn" class="close-btn">&times;</button>
  </div>

  <script>
    const gallery = document.getElementById('gallery');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const closeBtn = document.getElementById('close-btn');

    const images = [
      'image/1.jpg',
      'image/6.jpg',
      'image/3.jpg',
      'image/4.jpg',
      'image/5.jpg'
    ];

    for (let i = 0; i < 15; i++) {
      const img = document.createElement('img');
      img.src = images[i % images.length];
      img.alt = `Image ${i + 1}`;

      img.addEventListener('click', () => {
        lightboxImg.src = img.src;
        lightbox.style.display = 'flex';
      });

      gallery.appendChild(img);
    }

    closeBtn.addEventListener('click', () => {
      lightbox.style.display = 'none';
    });

    lightbox.addEventListener('click', (e) => {
      if (e.target !== lightboxImg) {
        lightbox.style.display = 'none';
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        lightbox.style.display = 'none';
      }
    });
  </script>
  
</body>
</html>
