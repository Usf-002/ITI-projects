import React from 'react';

function Skills() {
  const skills = [
    { name: 'JavaScript', level: 92 },
    { name: 'React', level: 88 },
    { name: 'Node.js', level: 85 },
    { name: 'Python', level: 80 },
    { name: 'MongoDB', level: 78 },
    { name: 'Express.js', level: 82 }
  ];

  return (
    <section className="skills py-5" id="skills">
      <div className="container">
        <h2 className="text-center mb-5">Skills</h2>
        <div className="row justify-content-center">
          <div className="col-lg-8">
            {skills.map((skill, index) => (
              <div key={index} className="mb-4">
                <div className="d-flex justify-content-between mb-2" style={{ fontSize: '1.1rem' }}>
                  <span className="fw-bold" style={{ color: '#2d3748' }}>{skill.name}</span>
                  <span style={{ color: '#667eea', fontWeight: 600 }}>{skill.level}%</span>
                </div>
                <div className="progress">
                  <div
                    className="progress-bar"
                    role="progressbar"
                    style={{ width: `${skill.level}%` }}
                    aria-valuenow={skill.level}
                    aria-valuemin="0"
                    aria-valuemax="100"
                  ></div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}

export default Skills;
