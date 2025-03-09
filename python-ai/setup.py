from setuptools import setup, find_packages

setup(
    name="HMS_AI",
    version="1.0",
    packages=find_packages(),
    install_requires=[
        "flask",
        "scikit-learn",
        "pandas",
        "numpy",
        "pickle-mixin"
    ],
    entry_points={
        "console_scripts": [
            "start-hms-ai=app:run"
        ]
    },
)
