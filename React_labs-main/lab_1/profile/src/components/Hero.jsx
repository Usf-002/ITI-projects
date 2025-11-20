import React from 'react';

function Hero() {
  return (
    <section className="hero text-white text-center py-5" style={{ minHeight: '100vh', display: 'flex', alignItems: 'center' }}>
      <div className="container">
        <div style={{ marginBottom: '2rem' }}>
          <img 
            src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop&crop=faces" 
            alt="Youssef Hany - Profile" 
            className="rounded-circle"
            loading="eager"
            style={{ 
              width: '220px', 
              height: '220px', 
              objectFit: 'cover',
              border: '5px solid rgba(255,255,255,0.3)',
              boxShadow: '0 15px 35px rgba(0,0,0,0.3)'
            }}
            onError={(e) => {
              e.target.src = 'https://ui-avatars.com/api/?name=Youssef+Hany&size=220&background=667eea&color=fff&bold=true';
            }}
          />
        </div>
        <h1 className="display-2 fw-bold mb-3" style={{ fontSize: '4rem', letterSpacing: '2px' }}>Youssef Hany</h1>
        <p className="lead mb-5" style={{ fontSize: '1.5rem', fontWeight: 300, letterSpacing: '1px' }}>Full-Stack Developer</p>
        
        {/* Social Media Icons */}
        <div className="social-links mt-5">
          <a href="https://facebook.com" className="text-white" target="_blank" rel="noopener noreferrer">
            <i className="fab fa-facebook fa-2x"></i>
          </a>
          <a href="https://twitter.com" className="text-white" target="_blank" rel="noopener noreferrer">
            <i className="fab fa-twitter fa-2x"></i>
          </a>
          <a href="https://linkedin.com" className="text-white" target="_blank" rel="noopener noreferrer">
            <i className="fab fa-linkedin fa-2x"></i>
          </a>
          <a href="https://github.com" className="text-white" target="_blank" rel="noopener noreferrer">
            <i className="fab fa-github fa-2x"></i>
          </a>
        </div>
      </div>
    </section>
  );
}

export default Hero;
