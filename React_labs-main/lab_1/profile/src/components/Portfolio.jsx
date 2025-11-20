import React from 'react';

function Portfolio() {
  const projects = [
    { title: 'Task Management App', image: 'https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=400&h=300&fit=crop', description: 'Productivity tool with real-time sync' },
    { title: 'Weather Dashboard', image: 'https://images.unsplash.com/photo-1527482797697-8795b05a13fe?w=400&h=300&fit=crop', description: 'Interactive weather application' },
    { title: 'Recipe Finder API', image: 'https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=400&h=300&fit=crop', description: 'RESTful API with search functionality' },
    { title: 'Chat Application', image: 'https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=400&h=300&fit=crop', description: 'Real-time messaging platform' },
    { title: 'Expense Tracker', image: 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=400&h=300&fit=crop', description: 'Financial management tool' },
    { title: 'Learning Platform', image: 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?w=400&h=300&fit=crop', description: 'Online course management system' }
  ];

  return (
    <section className="portfolio py-5" id="portfolio">
      <div className="container">
        <h2 className="text-center mb-5">Portfolio</h2>
        <div className="row g-4">
          {projects.map((project, index) => (
            <div key={index} className="col-md-4">
              <div className="card h-100">
                <img 
                  src={project.image} 
                  className="card-img-top" 
                  alt={project.title}
                  loading="lazy"
                  onError={(e) => {
                    e.target.src = `https://via.placeholder.com/400x300/667eea/ffffff?text=${encodeURIComponent(project.title)}`;
                  }}
                />
                <div className="card-body">
                  <h5 className="card-title">{project.title}</h5>
                  <p className="card-text">{project.description}</p>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

export default Portfolio;
